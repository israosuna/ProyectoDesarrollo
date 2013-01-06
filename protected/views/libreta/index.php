<?php
$this->breadcrumbs=array(
	'Libretas',
);

$this->menu=array(
	array('label'=>'Crear Libreta', 'url'=>array('create')),
  //  array('label'=>'Mofificar Nota', 'url'=>array('update', 'id'=>$model->id_libreta)),
	//array('label'=>'Modificar Libreta', 'url'=>array('update')),
);
?>

<h1>Libretas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'enablePagination'=>true,
)); ?>
