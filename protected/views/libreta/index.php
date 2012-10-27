<?php
$this->breadcrumbs=array(
	'Libretas',
);

$this->menu=array(
	array('label'=>'Create Libreta', 'url'=>array('create')),
	array('label'=>'Manage Libreta', 'url'=>array('admin')),
);
?>

<h1>Libretas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
