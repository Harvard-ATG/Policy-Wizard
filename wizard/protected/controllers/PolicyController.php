<?php

class PolicyController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow',  // allow admins to do what
				'actions'=>array('selection','edit','save','admindex'),
				'roles'=>array('admin','super'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$external_id = Yii::app()->getRequest()->getParam('topicId');
		$body = Policy::getBody($external_id);
		$this->render('index', array(
			'policy'=>$body
		));	
	}

	/**
	 * This is the default 'index' action that is invoked for an admin
	 */
	public function actionAdmindex()
	{
		$external_id = Yii::app()->getRequest()->getParam('topicId');
		$body = Policy::getBody($external_id);
		$this->render('admindex', array(
			'policy'=>$body
		));	
	
	}
	
	public function actionSelection(){
		$this->render('selection');
	}

	/**
	 * edit action. 
	 * this requires a get param
	 * @param number $id $template_id
	 * @param number $id2 $policy_id for edit purposes
	 */
	public function actionEdit($id='', $id2=''){
		//error_log("actionEdit");
		$template_id = $id;
		$policy_id = $id2;
		$external_id = Yii::app()->getRequest()->getParam('topicId');
		$templates = PolicyTemplate::getActiveTemplates();
		
		// check to see if it's being submitted
		$body = Yii::app()->getRequest()->getParam('body');
		if($body != ''){
			// then it's a submit
			// if it's successful, progress to admindex
			if(Policy::publishPolicy($body, $external_id)){
				$this->jsredirect($this->url('/policy/admindex'));
			}
		} else {
			if($policy_id == ''){
				// then it's new
				// get the body from the template_id
				$body = PolicyTemplate::getBody($template_id);
			} else {
				// else it's an edit
				// TODO
			}			
			
		}
		
		
		$this->render('edit', array(
			'template_id' => $template_id,
			'policy_id' => $policy_id,
			'body' => $body,
			'templates'=>$templates
		));
	}
	
	public function actionSave(){
		$this->layout = false;
		
		// get the external_id
		$external_id = Yii::app()->getRequest()->getParam('topicId');
		// get the body
		$body = Yii::app()->getRequest()->getParam('body');
		
		// save
		echo json_encode(array('response'=>'1'));
		Yii::app()->end();
		
	}
	

	
}