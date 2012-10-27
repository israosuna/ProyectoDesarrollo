<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<table class="menu">
    <tr>
        <td>
            <center>
            <a class="botones" href="<?=Yii::app()->baseUrl?>/libreta">
                <img  src="<?=Yii::app()->baseUrl?>/images/blue-notebook.png"/>
            </a>
            <span>
                Ver Libretas
            </span>
            </center>    
        </td>

        <td>
            <center>
            <a class="botones"  href="<?=Yii::app()->baseUrl?>/nota">
                <img  src="<?=Yii::app()->baseUrl?>/images/note.png"/>
                
            </a>
            
             <span>
                Ver Notas
            </span>
            </center>
        </td>
    </tr>
    <tr>
        <td>
            <center>
            <a class="botones" href="<?=Yii::app()->baseUrl?>/libreta/create">
                <img  src="<?=Yii::app()->baseUrl?>/images/evernote.png"/>
            </a>
            <span>
                Agregar Libreta
            </span>
            </center>    
        </td>

        <td>
            <center>
            <a class="botones" href="<?=Yii::app()->baseUrl?>/nota/create">
                <img  src="<?=Yii::app()->baseUrl?>/images/blue-document.png"/>
                
            </a>
            
             <span>
                Agregar Nota
            </span>
            </center>
        </td>
    </tr>    
</table>