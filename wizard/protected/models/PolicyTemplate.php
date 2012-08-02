<?php

/**
 * PolicyTemplate
 *
 * This is the model class for table "POLICY_TEMPLATES".
 *
 * The followings are the available columns in table 'POLICY_TEMPLATES':<br>
 * integer $id <br>
 * string $name <br>
 * string $is_active <br>
 * integer $sort_order <br>
 * text $body <br>
 *
 * @package app.Model
 */
class PolicyTemplate extends CActiveRecord
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
		return 'POLICY_TEMPLATES';
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
			array('NAME', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, IS_ACTIVE, SORT_ORDER, BODY', 'safe', 'on'=>'search'),
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
			'NAME' => 'Name',
			'IS_ACTIVE' => 'Is Active',
			'SORT_ORDER' => 'Sort Order By',
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
		$criteria->compare('NAME',$this->NAME);
		$criteria->compare('IS_ACTIVE',$this->IS_ACTIVE);
		$criteria->compare('SORT_ORDER',$this->SORT_ORDER);
		$criteria->compare('BODY',$this->BODY);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getBody($template_id){
		$policy_template = PolicyTemplate::model()->findByPk($template_id);
		return $policy_template->BODY;
		
	}
	
}