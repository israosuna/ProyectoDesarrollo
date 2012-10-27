<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->id_nota,
);

$this->menu=array(
	array('label'=>'List Nota', 'url'=>array('index')),
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'Update Nota', 'url'=>array('update', 'id'=>$model->id_nota)),
	array('label'=>'Delete Nota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nota),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>View Nota #<?php echo $model->id_nota; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_nota',
		'id_libreta',
		'titulo',
		'contenido',
	),
)); ?>
