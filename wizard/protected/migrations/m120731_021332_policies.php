<?php
require_once("Autoincrement.php");

class m120731_021332_policies extends CDbMigration
{
	public function up()
	{
		$this->createTable('POLICIES', array(
			'ID' => 'pk',
			'EXTERNAL_ID' => 'integer',
			'TEMPLATE_ID' => 'integer',
			'IS_PUBLISHED' => 'string',
			'PUBLISHED_BY' => 'text',
			'PUBLISHED_DATE' => "timestamp",
			'BODY' => 'text',
		));	
		
		Autoincrement::up('POLICIES', Yii::app()->db->driverName);
	}

	public function down()
	{
		Autoincrement::down('POLICIES', Yii::app()->db->driverName);
		
		$this->dropTable('POLICIES');
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