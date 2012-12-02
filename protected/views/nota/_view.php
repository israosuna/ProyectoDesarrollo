<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nota')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nota), array('view', 'id'=>$data->id_nota)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_libreta')); ?>:</b>
	<?php echo CHtml::encode($data->id_libreta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />


	<?php echo CHtml::encode($model->hash_etiquetas); ?>
	<br />
</div>