<?php
/* @var $this StypeController */
/* @var $model Stype */

$this->breadcrumbs=array(
	'Stypes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Stype', 'url'=>array('index')),
	array('label'=>'Create Stype', 'url'=>array('create')),
	array('label'=>'View Stype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Stype', 'url'=>array('admin')),
);
?>

<h1>Update Stype <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>