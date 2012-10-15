<?php
/* @var $this LibretaController */
/* @var $model Libreta */

$this->breadcrumbs=array(
	'Libretas'=>array('index'),
	$model->id_libreta=>array('view','id'=>$model->id_libreta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Libreta', 'url'=>array('index')),
	array('label'=>'Create Libreta', 'url'=>array('create')),
	array('label'=>'View Libreta', 'url'=>array('view', 'id'=>$model->id_libreta)),
	array('label'=>'Manage Libreta', 'url'=>array('admin')),
);
?>

<h1>Update Libreta <?php echo $model->id_libreta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>