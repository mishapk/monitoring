<?php
/* @var $this SensorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sensors',
);

$this->menu=array(
	array('label'=>'Create Sensor', 'url'=>array('create')),
	array('label'=>'Manage Sensor', 'url'=>array('admin')),
);
?>

<h1>Sensors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
