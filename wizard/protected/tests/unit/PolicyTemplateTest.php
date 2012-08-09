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
	
	public function testPolicyTemplate(){
		$template_id = 1;
		$body = $this->policytemplates['policytemplate1']['BODY'];
		$name = $this->policytemplates['policytemplate1']['NAME'];
		
		$policy_template = PolicyTemplate::getPolicyTemplate($template_id);
		$this->assertEquals($body, $policy_template['BODY']);
		$this->assertEquals($name, $policy_template['NAME']);
		
		//$this->markTestIncomplete();
		
	}
   
	public function testGetActiveTemplates(){
		$templates = PolicyTemplate::getActiveTemplates();
		$this->assertEquals(3, count($templates));
	}

}
