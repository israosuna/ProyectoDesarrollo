<?php
$this->breadcrumbs=array(
	'Notas',
);

$this->menu=array(
	array('label'=>'Crear Nota', 'url'=>array('create')),

	//array('label'=>'Borrar Nota', 'url'=>array('admin')),
);

if(isset($_GET['id_libreta'])){
    $this->menu= array_merge($this->menu, array(
        array('label'=>'Borrar Libreta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('libreta/delete','id'=>$_GET['id_libreta']),'confirm'=>'Are you sure you want to delete this item?')),
));
}
?>

<h1>Notas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'enablePagination'=>true,
)); ?>
