<?php

class NotaTest extends CDbTestCase
{
	public $fixtures=array(
		'notas'=>'Nota',
	);
        //valida la creacion de la nota edicion y delete, busqueda
	
        public function testCrear()
	{
            $nota= new Nota();
            $pre = $this->getFixtureData('notas');
            $nota->setAttributes($pre['pruebaCrear']);
            Yii::log(print_r($pre,TRUE),'error');

            Yii::log(print_r($nota->getAttributes(),TRUE),'error');

            $this->assertTrue($nota->save(),'No se pudo guardar la nota');
            $nota->hash_etiquetas=$pre['pruebaCrear']['hash_etiquetas'];
            $nota->save();
	}
    public function testAdjuntar(){
      /*
            $nota= new Nota();
            $pre = $this->getFixtureData('notas');
            $nota->setAttributes($pre['pruebaAdjuntar']);
            Yii::log(print_r($pre,TRUE),'error');

            Yii::log(print_r($nota->getAttributes(),TRUE),'error');

            $this->assertTrue($nota->save(FALSE),'No se pudo guardar la nota');
            

        
        $archivoAdjunto = new ArchivoAdjunto();
        
        
        
        $ruta_archivo1= 'ProyectoDesarrollo/'.$pre['pruebaAdjuntar']['ruta_archivo1'];
        copy($pre['pruebaAdjuntar']['rutaBase'].$pre['pruebaAdjuntar']['ruta_archivo1'], dirname(__FILE__).'/../../../'.$ruta_archivo1);
        $exito=$archivoAdjunto->subirArchivo($ruta_archivo1, $nota->id_nota);
        $this->assertTrue($exito,'No se pudo subir archivo 1 ');
        
        $ruta_archivo2= 'ProyectoDesarrollo/'.$pre['pruebaAdjuntar']['ruta_archivo2'];
        copy($pre['pruebaAdjuntar']['rutaBase'].$pre['pruebaAdjuntar']['ruta_archivo2'], dirname(__FILE__).'/../../../'.$ruta_archivo2);
        $archivoAdjunto->subirArchivo($ruta_archivo2, $nota->id_nota);
               $this->assertTrue($exito,'No se pudo subir archivo 2 ');

        
        $ruta_archivo3= 'ProyectoDesarrollo/'.$pre['pruebaAdjuntar']['ruta_archivo3'];
        copy($pre['pruebaAdjuntar']['rutaBase'].$pre['pruebaAdjuntar']['ruta_archivo3'], dirname(__FILE__).'/../../../'.$ruta_archivo3);
        $archivoAdjunto->subirArchivo($ruta_archivo3, $nota->id_nota);
                $this->assertTrue($exito,'No se pudo subir archivo 3 ');
                
                
                
*/
    }

    public function testBuscar(){
        $this->testCrear();
                    
                    $pre = $this->getFixtureData('notas');
                    $condicion=Nota::model()->ConditionQuery($pre['pruebaBuscar']['query'],false);
                    $notas= Nota::model()->find($condicion);
                    Yii::log($condicion.' este es el query','error');
                    if(count($notas)<=0){
                        
                    
                    Yii::log('Nota no encontrado ', CLogger::LEVEL_ERROR); 
                    Yii::log(count($notas).' Error de contador','error');
                    
                    }
                    $this->assertTrue(count($notas)>0,'No hay notas relacionadas con la busqueda');
                     
                            

    }
        
}