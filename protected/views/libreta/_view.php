<div class="view">



	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->nombre), array('/nota/index', 'id_libreta'=>$data->id_libreta)); ?>
        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>