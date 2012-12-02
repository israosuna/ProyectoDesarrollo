<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id_usuario)),
	array('label'=>'Modificar Usuario', 'url'=>array('admin')),
);
?>

<h1>Update Usuario <?php echo $model->id_usuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>