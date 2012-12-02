<?php
$this->breadcrumbs=array(
	'Notas',
);

$this->menu=array(
	array('label'=>'Crear Nota', 'url'=>array('create')),
	//array('label'=>'Borrar Nota', 'url'=>array('admin')),
);
?>

<h1>Notas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'enablePagination'=>true,
)); ?>
