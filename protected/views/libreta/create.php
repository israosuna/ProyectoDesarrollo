<?php
/* @var $this LibretaController */
/* @var $model Libreta */

$this->breadcrumbs=array(
	'Libretas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Libreta', 'url'=>array('index')),
	array('label'=>'Manage Libreta', 'url'=>array('admin')),
);
?>

<h1>Create Libreta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>