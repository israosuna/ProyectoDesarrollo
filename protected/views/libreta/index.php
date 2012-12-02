<?php
$this->breadcrumbs=array(
	'Libretas',
);

$this->menu=array(
	array('label'=>'Crear Libreta', 'url'=>array('create')),
	array('label'=>'Modificar Libreta', 'url'=>array('admin')),
);
?>

<h1>Libretas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
