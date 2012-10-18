<?php
/* @var $this EtiquetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etiquetas',
);

$this->menu=array(
	array('label'=>'Create Etiqueta', 'url'=>array('create')),
	array('label'=>'Manage Etiqueta', 'url'=>array('admin')),
);
?>

<h1>Etiquetas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
