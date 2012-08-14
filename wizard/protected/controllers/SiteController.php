<?php

class SiteController extends Controller
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
				'actions'=>array('index','view','jsredirect'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admindex'),
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
		//error_log("actionIndex");
		$perm_id = Yii::app()->user->perm_id;
		$external_id = Yii::app()->getRequest()->getParam('topicId');
		
		// if there is no active policy for this topic
		if(Policy::hasPolicy($external_id)){
			// if it is published
			if(Policy::isPublished($external_id)){
				if($perm_id <= UserIdentity::ENROLLEE){
					//$this->jsredirect($this->url('/policy/index'));
					$this->forward('/policy/index');
				} else {
					//$this->jsredirect($this->url('/policy/admindex'));
					$this->forward('/policy/admindex');
				}
			} else { // if it's not published
				if($perm_id <= UserIdentity::ENROLLEE){
					$this->render('index');			
				} else {
					//$this->jsredirect($this->url('/site/admindex'));
					$this->forward('/site/admindex');
				}				
				
			}
			
		} else {
			if($perm_id <= UserIdentity::ENROLLEE){
				$this->render('index');			
			} else {
				//$this->jsredirect($this->url('/site/admindex'));
				$this->forward('/site/admindex');
			}
			
		}
		
	
	}
	
	public function actionAdmindex(){
		$this->render('admindex');			
		
	}

	
	public function actionJsredirect(){
		
		if(isset(Yii::app()->session['jsredirect'])){
			$this->render('jsredirect',array(
				'url'=>Yii::app()->session['jsredirect'],
			));
		}
		
	}
	
}