<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	$model->id_etiqueta,
);

$this->menu=array(
	array('label'=>'List Etiqueta', 'url'=>array('index')),
	array('label'=>'Create Etiqueta', 'url'=>array('create')),
	array('label'=>'Update Etiqueta', 'url'=>array('update', 'id'=>$model->id_etiqueta)),
	array('label'=>'Delete Etiqueta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_etiqueta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Etiqueta', 'url'=>array('admin')),
);
?>

<h1>View Etiqueta #<?php echo $model->id_etiqueta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_etiqueta',
		'nombre',
	),
)); ?>
