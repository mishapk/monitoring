<?php

/**
 * This is the model class for table "tbl_events".
 *
 * The followings are the available columns in table 'tbl_events':
 * @property integer $id
 * @property DateTime $created
 * @property string $title
 * @property string $info
 * @property integer $sensor_id
 * @property integer $level_id
 * @property integer $user_id
 * @property integer $id_enterprise
 * @property string $raw_info
 *
 * The followings are the available model relations:
 * @property TblUser $user
 * @property TblLevel $level
 * @property TblSensor $sensor
 */
class Events extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_events';
	}
//--------------------------------------------------------------------------
		public $enterprise_search;
		public $object_search;
		public $sensor_search;
		public $stype_search; 	
                public $level_search;
                public $sensor_place;
//--------------------------------------------------------------------------
        
        public function beforeSave() {
            if(parent::beforeSave())
            {
                if($this->isNewRecord){
                    $this->user_id = Yii::app()->user->id;
                    $this->created = new CDbExpression('NOW()');
                  //  $this->level_id=
                            
                }
                return true;
            }   else
                return false;
        }
//--------------------------------------------------------------------------        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' ', 'required'),
			array('sensor_id, level_id, user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, title, info, sensor_id, level_id, user_id, raw_info, enterprise_search, sensor_place,stype_search', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'sensor' => array(self::BELONGS_TO, 'Sensor', 'sensor_id'),
                         'object'=>array(self::HAS_ONE,'Object',
					array('id_object'=>'id'),'through'=>'sensor'),
                        'enterprise'=>array(self::HAS_ONE,'Enterprise',
					array('id_enterprise'=>'id'),'through'=>'object'), 
                        'stype'=>array(self::HAS_ONE,'SType',
                                        array('id_type'=>'id'),'through'=>'sensor'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created' => 'Created',
			'title' => 'Title',
			'info' => 'Info',
                        'address'=>'Sensor Address',
			'sensor_id' => 'Sensor',
			'level_id' => 'Level',
			'user_id' => 'User',
			'raw_info' => 'Raw Info',
                        'enterprise' => 'Enterprise',
                        'object' => 'Object',
                        'id_enterprise'=>'Enterprise',
                        'enterprise_search' => 'Enterprise',
                        'stype_search'=>'SensorType',
                        'sensor_place'=>'Place',
                        'level_search'=>'Level',
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
		$criteria->compare('created',$this->created,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('sensor_id',$this->sensor_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('raw_info',$this->raw_info,true);
		$criteria->with= array('enterprise');
		$criteria->compare('enterprise.title',$this->enterprise_search,true);
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
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
