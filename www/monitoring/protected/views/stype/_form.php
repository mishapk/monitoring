<?php
/* @var $this StypeController */
/* @var $model Stype */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stype-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textField($model,'info',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'svg'); ?>
		<?php echo $form->textArea($model,'svg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'svg'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'p1'); ?>
		<?php echo $form->textArea($model,'p1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p1'); ?>
	</div>
        
                <div class="row">
		<?php echo $form->labelEx($model,'p2'); ?>
		<?php echo $form->textArea($model,'p2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p2'); ?>
	</div>
                <div class="row">
		<?php echo $form->labelEx($model,'p3'); ?>
		<?php echo $form->textArea($model,'p3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p3'); ?>
	</div>
                <div class="row">
		<?php echo $form->labelEx($model,'p4'); ?>
		<?php echo $form->textArea($model,'p4',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->