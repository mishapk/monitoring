<?php
/* @var $this StypeController */
/* @var $model Stype */

$this->breadcrumbs=array(
	'Stypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Stype', 'url'=>array('index')),
	array('label'=>'Manage Stype', 'url'=>array('admin')),
);
?>

<h1>Create Stype</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>