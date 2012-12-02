<?php
$this->breadcrumbs=array(
	'Libretas'=>array('index'),
	$model->id_libreta,
);

$this->menu=array(
	array('label'=>'Listar Libretas', 'url'=>array('index')),
	array('label'=>'Crear Libreta', 'url'=>array('create')),
	array('label'=>'Modificar Libreta', 'url'=>array('update', 'id'=>$model->id_libreta)),
	array('label'=>'Borrar Libreta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_libreta),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Libreta', 'url'=>array('admin')),
);
?>

<h1>Libreta</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_libreta',
		//'id_usuario',
		'nombre',
		'fecha',
	),
)); ?>
