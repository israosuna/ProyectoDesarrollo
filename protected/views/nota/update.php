<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->id_nota=>array('view','id'=>$model->id_nota),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nota', 'url'=>array('index')),
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'View Nota', 'url'=>array('view', 'id'=>$model->id_nota)),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>Update Nota <?php echo $model->id_nota; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>