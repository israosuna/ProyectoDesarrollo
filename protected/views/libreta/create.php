<?php
$this->breadcrumbs=array(
	'Libretas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Libreta', 'url'=>array('index')),
	array('label'=>'Gestionar Libreta', 'url'=>array('admin')),
);
?>

<h1>Create Libreta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>