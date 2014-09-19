<?php

/**
 * This is the model class for table "tbl_enterprise".
 *
 * The followings are the available columns in table 'tbl_enterprise':
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $info
 * @property double $e_lng
 * @property double $e_lat
 
 */
class Enterprise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
       public function getEnterprises()
       {
            
           $res=array();
            $res=array('' => 'Select')+CHtml::listData(Enterprise::model()->findAll(),'id','title');
            return $res;  
       }        
	public function tableName()
	{
		return 'tbl_enterprise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, address, info, e_lng, e_lat', 'required'),
			array('e_lng, e_lat', 'numerical'),
			array('title', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, address, info, e_lng, e_lat', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'info' => 'Info',
			'e_lng' => 'E Lng',
			'e_lat' => 'E Lat',
			
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('e_lng',$this->e_lng);
		$criteria->compare('e_lat',$this->e_lat);
                $id=yii::app()->user->getEID();
                if($id>0) $criteria->condition='id='.$id;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Enterprise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
