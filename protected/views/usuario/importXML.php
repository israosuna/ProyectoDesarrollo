<?php if(isset($message)){ ?>

        <?php echo $message ?>

<?php }else{ ?>

<form method="post" enctype="multipart/form-data" action="<?php echo CHtml::normalizeUrl(array('/usuario/importXML')); ?>">
    
    <input type="file" name="xmlfile" > <br/>
    <input type="submit" value="ENVIAR XML" ><br/>
    
</form>

<?php } ?>

