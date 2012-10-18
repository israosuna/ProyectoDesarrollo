<?php
/* @var $this EtiquetaController */
/* @var $data Etiqueta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_etiqueta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_etiqueta), array('view', 'id'=>$data->id_etiqueta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>