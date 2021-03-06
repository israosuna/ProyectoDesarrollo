<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Nota', 'url'=>array('index')),
	array('label'=>'Modificar Nota', 'url'=>array('admin')),
);
?>

<h1>Crear Nota</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_libreta'); ?>
		<?php echo $form->dropDownList($model,'id_libreta',  Libreta::model()->getArray('id_usuario='.Yii::app()->user->id_usuario)); ?>
		<?php echo $form->error($model,'id_libreta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>
        
         <div class="row">
                <?php $fecha = date( 'Y-m-d H:i:s' );?>
		<?php echo $form->labelEx($model,'fecha'); ?>
                <?php echo $fecha; ?>
		<?php echo $form->hiddenfield($model,'fecha',  array('value'=>$fecha)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Next'); ?>
	</div>
       

<?php $this->endWidget(); ?>

</div><!-- form -->
