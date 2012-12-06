<?php

class NotaTest extends CDbTestCase
{
	public $fixtures=array(
		'nota'=>'Nota',
	);
        //valida la creacion de la nota edicion y delete, busqueda
	public function testPruebaPrincipalNota()
	{
            $nota= new Nota();
            $nota->setAttribute($this->getFixtureData('prueba1'));
            
            
            $this->assertTrue($nota->save(FALSE),'No se pudo guardar la nota');
            $this->assertNotNull($nota->id_nota,'Id invalido');
            
            
            $nota= Nota::model()->findByPk($nota->id_nota);
            $this->assertNotNull($nota,'No se puede encontrar Notas');
            $nota->setAttribute($this->getFixtureData('prueba2'));
            
            
            $this->assertTrue($nota->save(FALSE),'No se pudo editar la Nota');
            
            $pk = $nota->id_nota;
            
            $nota= Nota::model()->findByPk($nota->id_nota);
            $this->assertNotNull($nota,'No se puede encontrar Notas');
            $nota->delete();
            
            $nota= Nota::model()->findByPk($pk);
            $this->assertNull($nota,'No se puede borrar la nota');
                     
	}
        
        
}