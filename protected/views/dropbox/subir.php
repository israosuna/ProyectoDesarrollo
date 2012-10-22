<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo $form->labelEx($model, 'file');
echo $form->fileField($model, 'file');
echo $form->error($model, 'file');
echo CHtml::submitButton('subir');
// ...
$this->endWidget();

?>
