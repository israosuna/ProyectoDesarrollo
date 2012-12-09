<?php
return array(
	
	'pruebaCrear'=>array(
                'id_nota' => '1',
                'id_libreta' => '1',
                'titulo' => 'Prueba Unitaria',
		'contenido' => 'Contenido de la prueba unitari',
                'hash_etiquetas'=>'#hola #prueba #unitaria',
	),
        'pruebaAdjuntar'=> array(
                'id_nota' => '2',
                'id_libreta' => '1',
                'titulo' => 'Prueba Unitaria',
		'contenido' => 'adjuntoscontent',
                'hash_etiquetas'=>'#hola #prueba #unitaria',
                'rutaBase'=>dirname(__FILE__).'/',
                'ruta_archivo1'=>'screenshot.jpg',
                'ruta_archivo2'=>'screen.jpg',
                'ruta_archivo3'=>'iSync.png',
         

        ),
    'pruebaBuscar'=>array(
                'query'=>'#hola #prueba #unitaria',
	),
    
        
        );
