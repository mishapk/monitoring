<?php
/* @var $this SensorController */
/* @var $model Sensor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sensor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	
          <div class="row">
		<?php echo $form->labelEx($model,'id_type'); ?>
		<?php 
                     $a_lookup=array();
                     $a_lookup=array('' => 'Select')+CHtml::listData(Stype::model()->findAll(),'id','title');
                      echo $form->dropDownList($model,'id_type',$a_lookup); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x_cord'); ?>
		<?php echo $form->textField($model,'x_cord'); ?>
		<?php echo $form->error($model,'x_cord'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'y_cord'); ?>
		<?php echo $form->textField($model,'y_cord'); ?>
		<?php echo $form->error($model,'y_cord'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>
      
       <div class="row">
		<?php echo $form->labelEx($model,'id_enterprise'); ?>
		<?php 
                 $num=$model->id_object;  
                 $object=  Object::model()->find('id=:num',array(':num'=>$num));
                 $def=$object!=null?$object->id_enterprise:0; 
                      echo CHtml::dropDownList('id_enterprise','',Enterprise::getEnterprises(),
                              array(
                              'options' => array($def=>array('selected'=>true)),    
                              'ajax' => array(
                               'type'=>'POST', //request type
                                'url'=>CController::createUrl('sensor/dynamicobject'), //url to call.
                                //Style: CController::createUrl('currentController/methodToCall')
                                'update'=>'#'.CHtml::activeId($model,'id_object'), //selector to update
                                 //'data'=>'js:javascript statement' 
                                //leave out the data key to pass all form values through Updated upstream
                                )));   
                      ?>
		<?php echo $form->error($model,'id_enterprise'); ?>
	</div>
     
        <div class="row">
		<?php echo $form->labelEx($model,'id_object'); ?>
		<?php 
                    $num=Yii::app()->user->getEID(); 
                     $a_lookup=array(''=>'Select Enterprise');
                   if( isset($def)) 
                       $a_lookup=$num==0?array('' => 'Select')+CHtml::listData(Object::model()->findAll('id_enterprise=:num',array(':num'=>$def)),'id','title'):
                        CHtml::listData(Object::model()->findAll('id_enterprise=:num',array(':num'=>$num)),'id','title');
                  
                       
                     echo $form->dropDownList($model,'id_object',$a_lookup,
                              array(
                              'options' => array($num=>array('selected'=>true))) ); ?>
		<?php echo $form->error($model,'id_object'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
