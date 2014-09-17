<?php
/* @var $this ObjectController */
/* @var $model Object */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'object-form',
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
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'id_enterprise'); ?>
		<?php 
                     $a_lookup=array();
                     $num=Yii::app()->user->getEID();
                     $a_lookup=$num==0?array('' => 'Select')+CHtml::listData(Enterprise::model()->findAll(),'id','title'):
                         CHtml::listData(Enterprise::model()->findAll('id=:num',array(':num'=>$num)),'id','title');  
                  //   $a_lookup['0']='Все';
                   //  $a_lookup=array('' => '')+$a_lookup;
                     echo $form->dropDownList($model,'id_enterprise',$a_lookup); ?>
		<?php echo $form->error($model,'id_enterprise'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->