<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'object'); ?>
		<?php echo $form->textField($model,'object',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'object'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'sensor[address]',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'sensor[address]'); ?>
	</div>
	 <div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'sensor[level]',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'sensor[level]'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'raw_info'); ?>
		<?php echo $form->textArea($model,'raw_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'raw_info'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
