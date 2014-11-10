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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enterprise'); ?>
		<?php
                      
                      $num=$model->sensor->id_object; 
                      
                      $object=  Object::model()->find('id=:num',array(':num'=>$num));
                      $def=isset($obect)?$object->id_enterprise:null; 
                           echo CHtml::dropDownList('id_enterprise','',Enterprise::getEnterprises(),
                              array(
                              'options' => array($def=>array('selected'=>true)),    
                              'ajax' => array(
                               'type'=>'POST', //request type
                                'url'=>CController::createUrl('sensor/dynamicobject'), 
                                'update'=>'#'.CHtml::activeId($model,'object'), ))); 
                           ?>
		<?php echo $form->error($model,'enterprise'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'oject'); ?>
		<?php
                    $a_lookup=array(''=>'Select Enterprise');
                if( isset($def)) 
                     $a_lookup=array('' => 'Select')+CHtml::listData(Object::model()->findAll('id_enterprise=:num',array(':num'=>$def)),'id','title');
                     $num=$model->sensor->id_object; 
                      $sensor=  Sensor::model()->find('id=:num',array(':num'=>$num));
                      $def=$sensor->id_object;  
                        echo $form->dropDownList($model,'object',$a_lookup,
                               array(
                              'options' => array($def=>array('selected'=>true)),    
                              'ajax' => array(
                               'type'=>'POST', //request type
                                'url'=>CController::createUrl('sensor/dynamicsensor'), 
                                'update'=>'#'.CHtml::activeId($model,'sensor_id'), 
                                 'data'=>array('sensor_id'=>'js:this.value')
                                  ))); 
                      
                           ?>
		<?php echo $form->error($model,'object'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'sensor_id'); ?>
		<?php 
                    $a_lookup=array(''=>'Select object');
                     if( isset($def)) 
                     $a_lookup=array('' => 'Select')+CHtml::listData(Sensor::model()->findAll('id_object=:num',array(':num'=>$def)),'id','title');
                    echo $form->dropDownList($model,'sensor_id',$a_lookup); ?>
		<?php echo $form->error($model,'sensor_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
		<?php echo $form->dropDownList($model,'level_id',array('' => 'Select')+CHtml::listData(Level::model()->findAll(),'id','title')); ?>
		<?php echo $form->error($model,'level_id'); ?>
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
