<?php

class usuarioTest extends CDbTestCase {

    public $fixtures = array(
        'usuario' => 'Usuario',
    );

    public function testImport() {

        $pre = $this->getFixtureData('usuario');
        $testimport = Usuario::model()->importXML(file_get_contents($pre['pruebaImportXML']['xml']));

        $this->assertTrue($testimport, 'No se pudo IMPORTAR el usuario');
    }

    public function exportTest() {

        $pre = $this->getFixtureData('usuario');



        $usuario = Usuario::model()->find("usuario='" . $pre['pruebaImportXML']['usuario'] . "'");



        $this->assertTrue($usuario, 'No se pudo IMPORTAR el usuario');

        $content = $usuario->exportXML()->saveXML();

        $this->assertTrue($content, 'No se pudo IMPORTAR el usuario');

        file_put_contents($pre['pruebaExportXML']['xml'], $content);
    }
    
    


    public function testLogin() {
        $mock = $this->getMock('LoginFormMock');

        //Now we can tell the mock what we want to do:
        $mock->expects($this->once())
                ->method('login')
                ->will($this->returnValue(TRUE));

        $this->assertTrue($mock->login(), 'no se puedo lograr login');
    }
//
//    public function testimportXMLIsCalled($xml) {
//
//        $mock = $this->getMock('Usuario');
//
//        //Now we can tell the mock what we want to do:
//        $mock->expects($this->once())
//                ->method('importXML');
//        
//        $mock->importXML();
//        //$this->assertTrue(, 'no se genero un xml');
//    }
//
//    public function testfindIsCalled($condition = '', $params = array()) {
//
//        $this->findWasCalled = true;
//        return new UsuarioMock;
//    }
//
//    public function testgetAttributeIsCalled($name) {
//        $this->getAttributeWasCalled = true;
//        return 'isra';
//    }
//
//    public function testsaveIsCalled($runValidation = true, $attributes = null) {
//        $this->saveWasCalled = true;
//    }

}