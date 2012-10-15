<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	$model->id_etiqueta=>array('view','id'=>$model->id_etiqueta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Etiqueta', 'url'=>array('index')),
	array('label'=>'Create Etiqueta', 'url'=>array('create')),
	array('label'=>'View Etiqueta', 'url'=>array('view', 'id'=>$model->id_etiqueta)),
	array('label'=>'Manage Etiqueta', 'url'=>array('admin')),
);
?>

<h1>Update Etiqueta <?php echo $model->id_etiqueta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>