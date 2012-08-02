<?php

/**
 * Answer
 *
 * This is the model class for table "Answers".
 *
 * The followings are the available columns in table 'Answers':<br>
 * integer $id <br>
 * integer $external_id <br>
 * string $is_published <br>
 * string $published_by <br>
 * timestamp $published_date <br>
 * text $body <br>
 *
 * @package app.Model
 */
class Policy extends CActiveRecord
{

	/**
	 * model
	 *
	 * Returns the static model of the specified AR class.
	 * created originally by Yii's Gii
	 * 
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * tableName
	 *
	 * created originally by Yii's Gii
	 *
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'POLICIES';
	}

	/**
	 * rules
	 *
	 * created originally by Yii's Gii
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EXTERNAL_ID, PUBLISHED_BY', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, EXTERNAL_ID, IS_PUBLISHED, PUBLISHED_BY, PUBLISHED_DATE, BODY', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * relations
	 *
	 * created originally by Yii's Gii
	 *
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * attributeLabels
	 *
	 * created originally by Yii's Gii
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'EXTERNAL_ID' => 'External_Id',
			'IS_PUBLISHED' => 'Is Published',
			'PUBLISHED_BY' => 'Published By',
			'PUBLISHED_DATE' => 'Published Date',
			'BODY' => 'Body',
		);
	}

	/**
	 * search
	 *
	 * created originally by Yii's Gii
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('EXTERNAL_ID',$this->EXTERNAL_ID);
		$criteria->compare('IS_PUBLISHED',$this->IS_PUBLISHED);
		$criteria->compare('PUBLISHED_BY',$this->PUBLISHED_BY);
		$criteria->compare('PUBLISHED_DATE',$this->PUBLISHED_DATE);
		$criteria->compare('BODY',$this->BODY);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function hasPolicy($external_id){
		if(Policy::model()->findByAttributes(array('EXTERNAL_ID'=>$external_id)) == null)
			return false;
		else
			return true;
		
	}
	
}