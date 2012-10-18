<?php
/* @var $this LibretaController */
/* @var $data Libreta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_libreta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_libreta), array('view', 'id'=>$data->id_libreta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>