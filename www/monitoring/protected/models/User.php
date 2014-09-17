<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $enterprise_id
 * @property string $role
 *  @property string $Eid
 */
class User extends CActiveRecord
{
    public $enterprise_search;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}
//------------------------------------------------------------------------------
        public function afterValidate()
        {
            
        }        
//------------------------------------------------------------------------------        
        public function beforeSave()
        {
          
            if ($this->new_password)
               $this->password = $this->hashPassword($this->new_password);
                
            /*  if ($this->isNewRecord){ 
              $this->password=$this->hashPassword($this->password);
        
            } else {
               $model = User::model()->findByPk($this->id);
               $model->scenario = 'update';
               $this->password=!$this->validatePassword($model->password)?$this->password:$this->hashPassword($this->password);
             }
            
           */
            return parent::beforeSave(); 
        }    
  //----------------------------------------------------------------------------      
//-------------------------------------------------------------------------------  
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, enterprise_id, role', 'required'),
                        array('username', 'match', 'pattern'=>'#^[a-zA-Z0-9_\.-]+$#'),
			array('username', 'unique','allowEmpty'=>false),
                        array('email','email'),
                        array('new_password','length','min'=>6, 'allowEmpty'=>true),
                        array('enterprise_id', 'numerical', 'integerOnly'=>true),
			array('username, new_password, email, role', 'length', 'max'=>128),
			array('new_confirm', 'compare', 'compareAttribute'=>'new_password'),
                        
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, enterprise_id, role, enterprise_search', 'safe', 'on'=>'search'),
                    array('new_password', 'required', 'on'=>'register'),
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
                    'enterprise'   => array(self::BELONGS_TO, 'Enterprise', 'enterprise_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'new_password' => 'Password',
                        'new_confirm' => 'Confirm password',
			'email' => 'Email',
			'enterprise_id' => 'Enterprise',
			'role' => 'Role',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('enterprise_id',$this->enterprise_id);
                //-------------------------------------------------------
                $criteria->with= array('enterprise');
		$criteria->compare('enterprise.title',$this->enterprise_search,true);
                //--------------------------------------------------------
                $criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                          'sort'=>array(
                            'attributes'=>array(
                             'author_search'=>array(
                                 'asc'=>'enterprise.title',
                                   'desc'=>'enterprise.title DESC',
                                  ),
                              '*',
                              ),
                           ),
		));
	}
//-------------------------------------------------------------------------------
public $new_password;
public $new_confirm;
public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
//-------------------------------------------------------------------------------        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
