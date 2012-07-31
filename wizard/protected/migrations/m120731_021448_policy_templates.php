<?php
require_once("Autoincrement.php");

class m120731_021448_policy_templates extends CDbMigration
{
	public function up()
	{
		$this->createTable('POLICY_TEMPLATES', array(
			'ID' => 'pk',
			'NAME' => 'string NOT NULL',
			'IS_ACTIVE' => 'string',
			'SORT_ORDER' => 'integer',
			'BODY' => "text",
		));	
		
		Autoincrement::up('POLICY_TEMPLATES', Yii::app()->db->driverName);

	}

	public function down()
	{
		Autoincrement::down('POLICY_TEMPLATES', Yii::app()->db->driverName);
		
		$this->dropTable('POLICY_TEMPLATES');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}