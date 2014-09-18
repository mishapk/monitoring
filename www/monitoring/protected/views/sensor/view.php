<?php
/* @var $this SensorController */
/* @var $model Sensor */

$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Sensor', 'url'=>array('index')),
	array('label'=>'Create Sensor', 'url'=>array('create')),
	array('label'=>'Update Sensor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sensor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sensor', 'url'=>array('admin')),
);
?>

<h1>View Sensor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'address',
		'title',
		'place',
		'id_type',
		'x_cord',
		'y_cord',
		'state',
		'id_object',
	),
)); ?>
