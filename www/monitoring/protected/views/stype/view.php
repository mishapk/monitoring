<?php
/* @var $this StypeController */
/* @var $model Stype */

$this->breadcrumbs=array(
	'Stypes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Stype', 'url'=>array('index')),
	array('label'=>'Create Stype', 'url'=>array('create')),
	array('label'=>'Update Stype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Stype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Stype', 'url'=>array('admin')),
);
?>

<h1>View Stype #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'info',
		'svg',
	),
)); ?>
