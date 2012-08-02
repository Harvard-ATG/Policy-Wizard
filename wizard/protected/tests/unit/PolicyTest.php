<?php
/**
* PolicyTest unit test
*
* 
*/
class PolicyTest extends CDbTestCase {
   

	public $fixtures=array(
		'policies'=>'Policy',
		'policytemplates'=>'PolicyTemplate',
	);
	

	public function testHasPolicy(){
		$external_id = 1;
		$external_id2 = 2;
		$this->assertTrue(Policy::hasPolicy($external_id));
		$this->assertFalse(Policy::hasPolicy($external_id2));
		
		//$this->markTestIncomplete();	
	}
	
	public function testSavePolicy(){
		$external_id = 2;
		$body = "akjsdhfkajsd faksdnf kasjdfa ;sdklfasd fasdf";
		// test if a new one returns true
		$this->assertTrue(Policy::savePolicy($body, $external_id));
		
		//test if an edit returns true
		$body = "asdfasdf";
		$policy_id = 1;
		$this->assertTrue(Policy::savePolicy($body, $external_id, $policy_id));
		
		
		
		
	}
   
}
