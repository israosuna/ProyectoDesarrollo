<?php

class ConexionTest extends CDbTestCase {

    public $fixtures = array(
        'conexiones' => 'Usuario',
    );

    //valida la creacion de la nota edicion y delete, busqueda


    public function testConectar() {


        $pre = $this->getFixtureData('conexiones');

        $tokens = unserialize($pre['pruebaConexion']['token']);
        if (!ArchivoAdjunto::$autoload) {
            $url = CHtml::normalizeUrl(array('/Dropbox/Authorize'));
            spl_autoload_unregister(array('YiiBase', 'autoload'));
            $dropbox = Yii::getPathOfAlias('ext.dropbox');
            include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        }
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
            $account = $dropbox->getAccountInfo();
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            $this->assertTrue(false, 'no se puede conectar con dropbox: ' . $error);
        }
        if (!ArchivoAdjunto::$autoload) 
                spl_autoload_register(array('YiiBase', 'autoload'));
        
        ArchivoAdjunto::$autoload=true;
    }

}