<?php
class EBackButtonWidget extends CWidget {
 
    public function run() {
 
        echo CHtml::button('Volver', array(
            'name' => 'btnBack',
            'class' => 'uibutton loading confirm',
            'style' => 'width:150px;',
            'onclick' => "history.go(-1)",
                )
        );
    }
 
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
