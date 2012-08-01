<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	const SUPER = 9;
	const OWNER = 7;
	const ADMIN = 5;
	const ENROLLEE = 3;
	const GUEST = 1;

	public $id;
	protected $external_id;
	public $name;
	public $fname;
	public $lname;
	// this is a hash of collections and permissions
	protected $collections;
	public $perm;
	public $perm_id;
	
	/**
	 * Overriding constructor to help with testing
	 */
	public function __construct($id='', $userid='', $name='') {
		$this->username = $id;
		//$this->id = $id;
		$this->userid = $userid;
		$this->name = $name;
	}
	

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

		$this->errorCode=self::ERROR_NONE;
		
		return !$this->errorCode;
		
	}
	
	/**
	* UserIdentity::setup
	*
	* we check / update the database here.  
	*
	*/
	protected function setup(){
		
		//error_log("UserIdentity::setup");
		// if username is set, then we are logged in
		if($this->external_id){

			
			
		}


		
	}
	
	
}
