<?php
/* @var $this StypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stypes',
);

$this->menu=array(
	array('label'=>'Create Stype', 'url'=>array('create')),
	array('label'=>'Manage Stype', 'url'=>array('admin')),
);
?>

<h1>Stypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
