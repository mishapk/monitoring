<?php
/* @var $this SensorController */
/* @var $data Sensor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x_cord')); ?>:</b>
	<?php echo CHtml::encode($data->x_cord); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('y_cord')); ?>:</b>
	<?php echo CHtml::encode($data->y_cord); ?>
	<br />

	<b>
	<?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objects')); ?>:</b>
	<?php echo CHtml::encode($data->objects->title); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('enterprise')); ?>:</b>
	<?php echo CHtml::encode($data->objects->enterprise->title); ?>
	<br />
	 

</div>