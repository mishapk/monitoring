<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_password'); ?>
		<?php echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'new_password'); ?>
	</div>
        <div class="row"> 
                <?php echo $form->label($model,'new_confirm'); ?> 
                <?php echo $form->passwordField($model,'new_confirm',array('size'=>60,'maxlength'=>128)); ?> 
                <?php echo $form->error($model,'new_confirm'); ?>
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enterprise_id'); ?>
		<?php 
                     $a_lookup=array();
                     $a_lookup=CHtml::listData(Enterprise::model()->findAll(),'id','title');  
                     $a_lookup['0']='Все';
                     $a_lookup=array('' => 'Select')+$a_lookup;
                     echo $form->dropDownList($model,'enterprise_id',$a_lookup); ?>
		<?php echo $form->error($model,'enterprise_id'); ?>
	</div>

	
        <div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->dropDownList($model,'role',array(''=>'','user'=>'User','admin'=>'Admin','root'=>'Root','device'=>'Device')
                        // ,array('size'=>'6')
                      ); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
