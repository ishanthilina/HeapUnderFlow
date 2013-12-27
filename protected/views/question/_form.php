<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'question-form',
	// 'layout' => TbHtml::FORM_LAYOUTHORIZONTAL,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'title',array('size'=>100,'maxlength'=>128,'span' => 5)); ?>
	</div>

	<div class="row">

		<?php echo $form->textAreaControlGroup($model, 'content',
        array('span' => 7, 'rows' => 5)); ?>

		
	</div>

	<div class="row">
		<?php echo $form->textAreaControlGroup($model, 'tags',
        array('span' => 4, 'rows' => 2)); ?>

		
	</div>

	<div class="row">

		<?php echo $form->dropDownListControlGroup($model, 'resolved',
        array('0', '1')); ?>


		
	</div> 

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div> -->

	<!-- <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div> -->

	<?php echo TbHtml::formActions(array(
		TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		TbHtml::resetButton('Reset'),
		)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->