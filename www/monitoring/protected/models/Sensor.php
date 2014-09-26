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
        public $stype_search;
        public $objects_search;
        public $enterprise_search;
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
          public function getSensors()
       {
            
           $res=array();
            $res=array('' => 'Select')+CHtml::listData(Sensor::model()->findAll(),'id','title');
            return $res;  
       }
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, title, place, id_type, x_cord, y_cord, state', 'required'),
			array('address, id_type, x_cord, y_cord, state, id_object', 'numerical', 'integerOnly'=>true),
			array('title, place', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, address, title, place, id_type, x_cord, y_cord, state, stype_search,objects_search, enterprise_search', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Stype', 'id_type'),
			'objects' => array(self::BELONGS_TO, 'Object', 'id_object'),
                       'enterprise'=>array(self::HAS_ONE,'Enterprise',
					array('id_enterprise'=>'id'),'through'=>'objects'),
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
			'stype_search' => 'Type',
			'x_cord' => 'X Cord',
			'y_cord' => 'Y Cord',
			'state' => 'State',
			'objects_search' => 'Object',
                        'enterprise_search' => 'Enterprise',
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
		$criteria->alias='sensor';
		$criteria->compare('sensor.id',$this->id);
		$criteria->compare('sensor.address',$this->address);
		$criteria->compare('sensor.title',$this->title,true);
		$criteria->compare('sensor.place',$this->place,true);
		//$criteria->compare('id_type',$this->id_type);
		$criteria->compare('sensor.x_cord',$this->x_cord);
		$criteria->compare('sensor.y_cord',$this->y_cord);
		$criteria->compare('sensor.state',$this->state);
		//$criteria->compare('id_object',$this->id_object);
                 //-------------------------------------------------------
                //$criteria->with= array('type','type.title'=array('alias'=>'t_title'));
		$criteria->with= array('type','objects','enterprise');
		$criteria->compare('type.title',$this->stype_search,true);
		$criteria->compare('objects.title',$this->objects_search,true);
        $criteria->compare('enterprise.title',$this->enterprise_search,true);
                //--------------------------------------------------------
		$id=yii::app()->user->getEID();
                if($id>0) $criteria->condition='id_enterprise='.$id;
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
