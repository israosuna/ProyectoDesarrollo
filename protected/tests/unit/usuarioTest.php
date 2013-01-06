<?php

class usuarioTest extends CDbTestCase {

    public $fixtures = array(
        'usuario' => 'Usuario',
    );

public function testImport(){
    
            $pre = $this->getFixtureData('usuario');
            $testimport=Usuario::model()->importXML(file_get_contents($pre['pruebaImportXML']['xml']));
            
            $this->assertTrue($testimport,'No se pudo IMPORTAR el usuario');


}

public function exportTest(){
    
            $pre = $this->getFixtureData('usuario');
            
            
            
            $usuario = Usuario::model()->find("usuario='".$pre['pruebaImportXML']['usuario']."'");
            
            
            
            $this->assertTrue($usuario,'No se pudo IMPORTAR el usuario');
            
            $content=$usuario->exportXML()->saveXML();
            
            $this->assertTrue($content,'No se pudo IMPORTAR el usuario');
            
            file_put_contents($pre['pruebaExportXML']['xml'], $content);

}

}