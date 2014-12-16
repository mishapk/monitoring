<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Statistics', 'url'=>array('statistics')),
        array('label'=>'List Events', 'url'=>array('index')),
	//array('label'=>'Create Events', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#events-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Events</h1>

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
<?php 
function get($data)
{
    if($data->level_id==1)return $data->stype->p1;
    if($data->level_id==2)return $data->stype->p2;
    if($data->level_id==3)return $data->stype->p3;
    if($data->level_id==4)return $data->stype->p4;
    
}
?>
<?php 

$options='';
    if(!Yii::app()->user->checkAccess('root')) 
        $options='display:none'; 
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'created',
                array('name'=>'enterprise_search','value'=>'$data->object->enterprise?$data->object->enterprise->title:"-"'),
                array('name'=>'object_search','value'=>'$data->object?$data->object->title:"-"'),
               array('name'=>'sensor_id','type'=>'raw','value'=>'get($data)'),
                array('name'=>'sensor_place','value'=>'$data->sensor?$data->sensor->place:"-"'),
                array('name'=>'stype_search','value'=>'$data->stype?$data->stype->title:"-"'),
                array('name'=>'level_search','value'=>'$data->level?$data->level->title:"-"'),
	//	'title',
	//	'info',
	//	'sensor_id',
		'raw_info',
		
		/*
		'level_id',
		'user_id',
		
		*/
		array(
			'class'=>'CButtonColumn',
                        'deleteButtonOptions'=>array('style'=>$options), 
                        'updateButtonOptions'=>array('style'=>$options),    
		),
	),
)); ?>
