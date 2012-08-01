<?php

class RequireLogin extends CBehavior{
	
	public function attach($owner){
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
		
		
	}
	
	public function handleBeginRequest($event)
	{
		error_log("before");
		$identity = IdentityFactory::getIdentity();
		error_log("after");
		Yii::app()->user->login($identity);

	}
		
}

?>
