<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->id_nota=>array('view','id'=>$model->id_nota),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Nota', 'url'=>array('index')),
	array('label'=>'Crear Nota', 'url'=>array('create')),
	array('label'=>'Ver Nota', 'url'=>array('view', 'id'=>$model->id_nota)),
	//array('label'=>'Modificar Nota', 'url'=>array('admin')),
);
?>

<h1>Contenido de Nota </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>