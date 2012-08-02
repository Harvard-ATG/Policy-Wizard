<?php
/**
* PolicyTemplateTest unit test
*
* 
*/
class PolicyTemplateTest extends CDbTestCase {
   

	public $fixtures=array(
		'policies'=>'Policy',
		'policytemplates'=>'PolicyTemplate',
	);
	

	public function testGetBody(){
		$template_id = 1;
		$body = $this->policytemplates['policytemplate1']['BODY'];
		
		$this->assertEquals($body, PolicyTemplate::getBody($template_id));
		
		//$this->markTestIncomplete();
		
	}
   
}
