<?php

class SensorController extends Controller
{
        //-----------------------------------------------------------------------
           public function accessCompare($id)
         {
           //Ищем в БД по ID датчика его Enterprise.ID
           $criteria=new CDbCriteria();
		   $criteria->compare('t.id',$id); 
           $id=Sensor::model()->find($criteria);
           $num=$id?$id->enterprise->id:0;
           $idE=Yii::app()->user->getEID();
           //Берем У пользователя User.Enterprise_ID и сравниваем с Enterprise.ID датчика. 	
            if (($idE>0)&& ($idE!=$num)) 
                throw new CHttpException(403, 'Forbidden');
             }    
        //-----------------------------------------------------------------------	
	//------------------------------------------------------------------
    public function actionDynamicobject()
        {
      
              
        $data=Object ::model()->findAll('id_enterprise=:id_enterprise', 
                  array(':id_enterprise'=>(int) $_POST['id_enterprise']));
 
            $data=CHtml::listData($data,'id','title');
          // echo $data;
               
            if(count($data)) 
            {  
                 echo CHtml::tag('option',
                   array('value'=>''),CHtml::encode('Select'),true);
            foreach($data as $value=>$title)
                {
                 echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($title),true);    
            }
            }
            else 
            echo CHtml::tag('option',
                   array('value'=>''),CHtml::encode('Item no found'),true);
    }
        //------------------------------------------------------------------
      public function actionDynamicsensor()
        {
      
              
        $data=Sensor::model()->findAll('id_object=:id_object', 
                  array(':id_object'=>(int) $_POST['sensor_id']));
 
            $data=CHtml::listData($data,'id','title');
          // echo $data;
               
            if(count($data)) 
            {  
                 echo CHtml::tag('option',
                   array('value'=>''),CHtml::encode('Select'),true);
            foreach($data as $value=>$title)
                {
                 echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($title),true);    
            }
            }
            else 
            echo CHtml::tag('option',
                   array('value'=>''),CHtml::encode('Item no found'),true);
    }
        //------------------------------------------------------------------
    
        /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin','dynamicobject','dynamicsensor'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				//'users'=>array('@'),
                                'roles'=>array('admin'), 
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','create'),
				//'users'=>array('admin'),
                               'roles'=>array('admin'), 
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->accessCompare($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Sensor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sensor']))
		{
			$model->attributes=$_POST['Sensor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->accessCompare($id);
		$model=$this->loadModel($id);
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sensor']))
		{
			$model->attributes=$_POST['Sensor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->accessCompare($id);
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$id=yii::app()->user->getEID();
		if($id>0){
		$criteria->with=array('enterprise');
		$criteria->condition='id_enterprise='.$id;
		}
		$dataProvider=new CActiveDataProvider('Sensor',
		array('criteria'=>$criteria,));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sensor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sensor']))
			$model->attributes=$_GET['Sensor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sensor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sensor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sensor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sensor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
