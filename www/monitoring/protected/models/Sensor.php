<?php

/**
 * This is the model class for table "tbl_sensor".
 *
 * The followings are the available columns in table 'tbl_sensor':
 * @property integer $id
 * @property integer $address
 * @property string $title
 * @property string $place
 * @property integer $id_type
 * @property integer $x_cord
 * @property integer $y_cord
 * @property integer $state
 * @property integer $id_object
 *
 * The followings are the available model relations:
 * @property TblStype $idType
 * @property TblObjec $idObject
 */
class Sensor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_sensor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, title, place, id_type, x_cord, y_cord, state, id_object', 'required'),
			array('address, id_type, x_cord, y_cord, state, id_object', 'numerical', 'integerOnly'=>true),
			array('title, place', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, address, title, place, id_type, x_cord, y_cord, state, id_object', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idType' => array(self::BELONGS_TO, 'TblStype', 'id_type'),
			'idObject' => array(self::BELONGS_TO, 'TblObjec', 'id_object'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'address' => 'Address',
			'title' => 'Title',
			'place' => 'Place',
			'id_type' => 'Id Type',
			'x_cord' => 'X Cord',
			'y_cord' => 'Y Cord',
			'state' => 'State',
			'id_object' => 'Id Object',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('address',$this->address);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('x_cord',$this->x_cord);
		$criteria->compare('y_cord',$this->y_cord);
		$criteria->compare('state',$this->state);
		$criteria->compare('id_object',$this->id_object);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sensor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
