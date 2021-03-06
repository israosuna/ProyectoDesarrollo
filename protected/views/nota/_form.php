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
		<?php echo $form->textField($model,'titulo',array('size'=>30,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>
        
        <div class="row">
                <?php $fecha = date( 'Y-m-d H:i:s' );?>
		<?php echo $form->labelEx($model,'fecha'); ?>
                <?php echo $fecha; ?>
		<?php echo $form->hiddenfield($model,'fecha',  array('value'=>$fecha)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenido'); ?>
		<?php echo $form->textArea($model,'contenido',array('size'=>30,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'contenido'); ?>
	</div>
	
        <div class="row">
		<?php echo $form->labelEx($model,'hash_etiquetas'); ?>
		<?php echo $form->textField($model,'hash_etiquetas',array('size'=>30,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'hash_etiquetas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        <div class="row">
            <?php
            $this->widget('ext.coco.CocoWidget'
                ,array(
                    'id'=>'cocowidget1',
                    'onCompleted'=>'function(id,filename,jsoninfo){  }',
                    'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
                    'onMessage'=>'function(m){ alert(m); }',
                    'allowedExtensions'=>array('jpeg','jpg','gif','png'),
                    'sizeLimit'=>2000000,
                    'uploadDir' => 'ProyectoDesarrollo/',
                    // para recibir el archivo subido:
                    'receptorClassName'=>'application.models.ArchivoAdjunto',
                    'methodName'=>'subirArchivo',
                    'userdata'=>$model->id_nota,
                ));
        ?>
</div>  

<?php $this->endWidget(); ?>

</div><!-- form -->