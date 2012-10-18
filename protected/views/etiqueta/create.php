<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Etiqueta', 'url'=>array('index')),
	array('label'=>'Manage Etiqueta', 'url'=>array('admin')),
);
?>

<h1>Create Etiqueta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>