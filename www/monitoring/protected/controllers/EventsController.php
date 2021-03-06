<?php

class EventsController extends Controller
{
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
				'actions'=>array('index','view','admin','statistics'),
				'users'=>array('@'),
			),
			
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create'),
				//'users'=>array('admin'),
                               'roles'=>array('device'), 
			),    
                    
                          array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				//'users'=>array('admin'),
                               'roles'=>array('admin'), 
			),        
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','create','update'),
				//'users'=>array('admin'),
                               'roles'=>array('root'), 
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
		$model=new Events;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$ps=$_POST['Events'];
                        
                        //$model->attributes=$ps;
                        $model->raw_info=$ps['raw_info'];
                        $ids=Sensor::model()->findByAttributes(array('id_object'=>$ps['object'],'address'=>$ps['sensor']['address']));
                        if (!($ids->id>0))throw new CHttpException(404, 'SNF:Sensor no found');
                        $model->sensor_id=$ids->id;
                        $idl= Level::model()->findByAttributes(array('level'=>$ps['sensor']['level']));
                        if (!($idl->id>-6))throw new CHttpException(404, 'LNF:Level no found');
                        $model->level_id=$idl->id;
              
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
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
		$dataProvider=new CActiveDataProvider('Events',
		array('criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>5,
                    'pageVar'=>'page'),
                )        
                        );
                $dataProvider->sort->defaultOrder='t.id DESC';
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];
                $model->dbCriteria->order='t.id DESC';
		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionStatistics()
        {
           
            
                
            $l1=array_fill(0,12,0);
            $l2=array_fill(0,12,0);
            $l3=array_fill(0,12,0);
            $l4=array_fill(0,12,0);
            $l5=array_fill(0,12,0);
            $l6=array_fill(0,12,0);
            $mass=array($l1,$l2,$l3,$l4,$l5,$l6);
            
            $criteria = new CDbCriteria();
                $i=0;
		$id=yii::app()->user->getEID();
		if($id>0){
                $criteria->select='*, count(*) as cnt';    
		$criteria->with=array('enterprise');
		$criteria->condition='id_enterprise='.$id;
                $criteria->order='t.id ASC';
                $criteria->group='YEAR(created), MONTH(created),level_id';
                
		}
                
		$id=yii::app()->user->getEID();
		$a=  Events::model()->findAll($criteria);
                foreach ($a as $item)
                {
                    $month=Yii::app()->dateFormatter->format("M",strtotime($item->created));
                    $count=$item->cnt;
                    $level=$item->level_id;
                  //  echo $item->created,' month= ', $month,' level =', $level, ' count= ', $count; 
                   // echo '<hr/>';
               
                    $mass[$level][$month-1]=(int)$count;
                    $i=$i+1;
                }
          //      echo 'Count=',$i;    
	//	echo '<pre>';
                //print_r($a);
              //  echo '</pre>';
		$this->render('statistics',array(
			'mass'=>$mass,
		));
        }        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
