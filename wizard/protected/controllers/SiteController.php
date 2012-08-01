<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admindex'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','edit'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		
		
		// if there is no active policy for this topic
		// and if it's an enrollee
		// render index
		if($perm_id <= UserIdentity::ENROLLEE){
			$this->render('index');			
		} else {
			error_log("redirecting...");
			error_log($this->url('/site/admindex'));
			$this->jsredirect($this->url('/site/admindex'));
		}
		
		
		// if there is an active policy for this topic
		// and if it's an enrollee
		// redirect to policy/index
		// $this->redirect($this->url('/policy/index/'));
		
		// if there is an active policy for this topic
		// and if it's an admin
		// redirect to policy/admindex
		// $this->redirect($this->url('/policy/admindex/'));
		
	
	}
	
	public function actionAdmindex(){
		error_log("admindex");
		$this->render('admindex');			
		
	}

	
	public function actionJsredirect(){
		error_log(Yii::app()->session['jsredirect']);
		
		if(isset(Yii::app()->session['jsredirect'])){
			$this->render('jsredirect',array(
				'url'=>Yii::app()->session['jsredirect'],
			));
		}
		
	}
	
}