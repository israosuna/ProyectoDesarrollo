<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->id_nota,
);

$this->menu=array(
	array('label'=>'Listar Nota', 'url'=>array('index')),
	array('label'=>'Crear Nota', 'url'=>array('create')),
	array('label'=>'Mofificar Nota', 'url'=>array('update', 'id'=>$model->id_nota)),
	array('label'=>'Borrar Nota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nota),'confirm'=>'Are you sure you want to delete this item?')),
//  	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1> Nota</h1>
<div class="view">

	

	<b><?php echo CHtml::encode($model->getAttributeLabel('id_libreta')); ?>:</b>
	<?php echo CHtml::encode($model->libreta->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($model->titulo); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($model->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($model->contenido); ?>
	<br />
	<?php echo CHtml::encode($model->hash_etiquetas); ?>
	<br />
        <?php foreach ($model->archivo_adjuntos as $archivo)
            { ?>
        
	<?php echo CHtml::link($archivo->nombre_archivo,array('/Dropbox/Download','ruta'=>$archivo->ruta_archivo)); ?>
	<br />
         <?php echo CHtml::image(CHtml::normalizeUrl(array('/Dropbox/getThumb','ruta'=>$archivo->ruta_archivo))); ?>
	<br />
       <?php }   ?>  

   


</div>
