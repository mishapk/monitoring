<?php
/* @var $this SensorController */
/* @var $model Sensor */

$this->breadcrumbs=array(
	'Sensors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sensor', 'url'=>array('index')),
	array('label'=>'Create Sensor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sensor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sensors</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sensor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'address',
		'title',
		'place',
                array('name'=>'stype_search','value'=>'$data->type?$data->type->title:"-"'),
               array('name'=>'objects_search','value'=>'$data->objects?$data->objects->title:"-"'),
             //   array('name'=>'enterprise_search','value'=>'$data->objects->enterprise?$data->objects->enterprise->title:"-"'),
		/*'id_type',
		'x_cord',
		
		'y_cord',
		'state',
		'id_object',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
