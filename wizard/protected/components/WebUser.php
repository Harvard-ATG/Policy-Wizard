<?php
	
class WebUser extends CWebUser {

	public $fname;
	public $lname;
	public $perm;
	public $perm_id;
	
	/**
	 * just took the CWebUser::login and added some vars
	 */
	public function login($identity,$duration=0)
	{
		error_log("webuser::login");
		$id=$identity->getId();
		$states=$identity->getPersistentStates();
		if($this->beforeLogin($id,$states,false))
		{
			$this->changeIdentity($id,$identity->getName(),$states);

			if($duration>0)
			{
				if($this->allowAutoLogin)
					$this->saveToCookie($duration);
				else
					throw new CException(Yii::t('yii','{class}.allowAutoLogin must be set true in order to use cookie-based authentication.',
						array('{class}'=>get_class($this))));
			}

			$this->afterLogin(false);
		}
		$this->fname = $identity->fname;
		$this->lname = $identity->lname;
		$this->perm = $identity->perm;
		$this->perm_id = $identity->perm_id;

		return !$this->getIsGuest();
	}
	
	
	
}
	
?>