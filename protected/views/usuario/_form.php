<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->textField($model,'clave',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_dropbox'); ?>
		<?php echo $form->textField($model,'usuario_dropbox',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usuario_dropbox'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_dropbox'); ?>
		<?php echo $form->textField($model,'password_dropbox',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password_dropbox'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->