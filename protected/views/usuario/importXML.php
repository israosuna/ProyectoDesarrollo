<?php if(isset($message)){ ?>

<h1>    <?php echo $message ?> </h1>

<?php }else{ ?>
<h1>Seleccione archivo XML:</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo CHtml::normalizeUrl(array('/usuario/importXML')); ?>">
    
    <input type="file" name="xmlfile" > <br/>
    <input type="submit" value="ENVIAR XML" ><br/>
    
</form>

<?php } ?>

