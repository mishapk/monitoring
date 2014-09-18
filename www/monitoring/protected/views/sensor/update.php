<?php
/* @var $this SensorController */
/* @var $model Sensor */

$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sensor', 'url'=>array('index')),
	array('label'=>'Create Sensor', 'url'=>array('create')),
	array('label'=>'View Sensor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sensor', 'url'=>array('admin')),
);
?>

<h1>Update Sensor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>