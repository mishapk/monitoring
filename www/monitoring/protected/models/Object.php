<?php

/**
 * This is the model class for table "tbl_objec".
 *
 * The followings are the available columns in table 'tbl_objec':
 * @property integer $id
 * @property string $title
 * @property string $place
 * @property integer $id_enterprise
 *
 * The followings are the available model relations:
 * @property TblEnterprise $idEnterprise
 */
class Object extends CActiveRecord
{
    public $enterprise_search;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_objec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_enterprise', 'numerical', 'integerOnly'=>true),
			array('title, place', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, place, id_enterprise,enterprise_search,', 'safe', 'on'=>'search'),
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
		//	'idEnterprise' => array(self::BELONGS_TO, 'TblEnterprise', 'id_enterprise'),
                        'enterprise'   => array(self::BELONGS_TO, 'Enterprise', 'id_enterprise'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'place' => 'Place',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('place',$this->place,true);
		//$criteria->compare('id_enterprise',$this->id_enterprise);
                 //-------------------------------------------------------
        $criteria->with= array('enterprise');
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
	 * @return Objec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
