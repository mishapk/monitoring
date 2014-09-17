<?php
/* @var $this ObjectController */
/* @var $data Object */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_enterprise')); ?>:</b>
	<?php //echo CHtml::encode($data->id_enterprise); ?>
        <?php echo CHtml::encode($data->enterprise?$data->enterprise->title:"-"); ?>
	<br />


</div>