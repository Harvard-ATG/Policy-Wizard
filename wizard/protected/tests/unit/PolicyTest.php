<?php
/**
* PolicyTest unit test
*
* 
*/
class PolicyTest extends CDbTestCase {
   

	public $fixtures=array(
		'policies'=>'Policy',
	);
	

	public function testHasPolicy(){
		$external_id = 1;
		$external_id2 = 2;
		$this->assertTrue(Policy::hasPolicy($external_id));
		$this->assertFalse(Policy::hasPolicy($external_id2));
		
		//$this->markTestIncomplete();
		
	}
   
}
