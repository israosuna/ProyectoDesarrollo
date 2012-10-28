<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'libreta-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'id_usuario',array ('value'=> Yii::app()->user->id_usuario)); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
                <?php $fecha = date( 'Y-m-d H:i:s' );?>
		<?php echo $form->labelEx($model,'fecha'); ?>
                <?php echo $fecha; ?>
		<?php echo $form->hiddenfield($model,'fecha',  array('value'=>$fecha)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->