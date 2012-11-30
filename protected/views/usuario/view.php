<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuario </h1>

<div class="view">

	
	<b><?php echo CHtml::encode($model->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($model->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($model->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($model->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($model->clave); ?>
	<br />

	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	*/ ?>

</div>
