Coco! Multi file Uploader Widget
================================

by:
Christian Salazar. christiansalazarh@gmail.com	@yiienespanol, oct. 2012.
[http://trucosdeprogramacionmovil.blogspot.com/](http://trucosdeprogramacionmovil.blogspot.com/ "http://trucosdeprogramacionmovil.blogspot.com/")

[http://opensource.org/licenses/bsd-license.php](http://opensource.org/licenses/bsd-license.php "http://opensource.org/licenses/bsd-license.php")

[Go to Coco Repository at Bit Bucket !](https://bitbucket.org/christiansalazarh/coco/ "Go to Coco Repository at Bit Bucket !")
------------------------------------------------------------------------------------------------------------------------------

(Español & English)

1.	Single & Multi File Uploads via Ajax-jQuery
1.	Drag & Drop.


[EN]
'Coco' is a widget for yii framework designed to handle File Uploads (Single and Multiple). Is designed using Ajax-jQuery and a well formed Architecture based on MVC (and UML).  Using 'coco' is very simple, at first place you setup a fixed action in any controller, this action serves for all every coco-widgets in your application. At second place you insert the widget in your form, all uploaded files will be stored in the path provided by 'uploadDir' widget attribute. Very simple and usefull. Please enjoy it.
'
Coco takes its functionality from a very nice PHP library located at valums repository in github, all licences are explicit in coco related to Valums work.


[ES]
'Coco' es un widget (aparte de ser el menor y mas temeroso de mis Yorkies) para manejar subidas de archivos a tu website. Con este widget se pretende crear una herramienta que te ayude a olvidarte de la complejidad de este asunto, sacando provecho de Yii Framework, jQuery, Ajax y UML/MVC

La implementación del widget en tu proyecto es muy simple, se hace en dos partes: Primero, Pones el widget en la vista o formulario en donde lo requieras y Segundo en algun controller pones un action fijo en cualquier controller, no solamente aquel del formulario (un action fijo es aquel que se coloca en el metodo de actions() del controller), este action tiene como proposito conectar el código javascript del widget con tu aplicación Yii.

Coco toma su funcionalidad de una librería PHP muy buena que consegui hace un año y que decidí implementar para Yii framework en forma de Widget. La licencia del autor de la libreria original es respetada y matiene sus creditos. Puedes hallarlo en el repositorio valums de github.


INSTALACION / INSTALL
---------------------

## 1) GIT Cloning

		cd /home/blabla/myapp/protected
		mkdir extensions
		cd extensions
		git clone git@bitbucket.org:christiansalazarh/coco.git

		[ES] Si no usas GIT simplemente copia el contenido de la extension directamente dentro de 'extensions'
		[EN] If you dont use GIT please copy the entire 'coco' folder into your extensions folder

## 2) Setup 'config/main'

		'import'=>array(
			'application.models.*',
			'application.components.*',
			'application.extensions.coco.*',			// <------
		),

## 3) Action Setup

(EN) Connect the widget with your current application using a fixed Action in siteController (or a distinct controller if you prefer).

(ES) Conecta el widget con tu aplicación web, usa cualquier action.

By default, using: / Por defecto usar:

myapp/protected/controllers/SiteController.php

IMPORTANT:
	(ES) Este action solo es requerido una vez para todo el proyecto !!
	(EN) This action is required only one time for all above project !!

~~~
[php]
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
			'coco'=>array(
				'class'=>'CocoAction',
			),
		);
	}

~~~


## 4) Insert and configure the Widget / Configura el Widget

~~~
[php]
<?php
	$this->widget('ext.coco.CocoWidget'
		,array(
			'id'=>'cocowidget1',
			'onCompleted'=>'function(id,filename,jsoninfo){  }',
			'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
			'onMessage'=>'function(m){ alert(m); }',
			'allowedExtensions'=>array('jpeg','jpg','gif','png'),
			'sizeLimit'=>2000000,
			'uploadDir' => 'assets/', // please always remember to finish with an slash '/'

			// this arguments are used to send a notification
			// on a specific class when a new file is uploaded,
			// please configure and uncomment in order to receive
			// your uploaded file:

			// 'receptorClassName'=>'application.models.MyModel',
			// 'methodName'=>'onFileUploaded',
			// 'userdata'=>$model->primaryKey,
		));
	?>
~~~

## 5) (EN) How to receive the uploaded file.

Coco will invoke an specific method name (methodName) in an specific class provided in widget config (receptorClassName). When a new file arrives from upload the Coco will invoke this method passing to you the 'userdata' argument and the full file path.

By example, suppose you have /protected/models/MyModel.php and you need the uploaded file arrives in this class, so the widget config will be:

		// 'receptorClassName'=>'application.models.MyModel',
		// 'methodName'=>'myFileReceptor',
		// 'userdata'=>$model->primaryKey,

Your class and method in MyModel will be:

~~~
[php]
class MyModel {

	public function myFileReceptor($fullFileName,$userdata) {
		// userdata is the same passed via widget config.
	}
}
~~~




## 5) (ES) Cómo recibir el archivo que hemos subido.

Coco invocará un metodo especifico (methodName) en una clase (receptorClassName) que tu definas en la configuracion del widget. Cuando un archivo ha sido subido exitosamente entonces Coco instanciará esta clase que tu indicas e invoca el metodo mencionado, así tu recibes el archivo.

Ejemplo, supongamos que tienes la clase /protected/models/MyModel.php y quieres recibir aqui los archivos subidos para posterior procesamiento, entonces:

~~~
[php]
class MyModel {

	public function myFileReceptor($fullFileName,$userdata) {
		// userdata is the same passed via widget config.
		// userdata es el mismo valor pasado mediante la config del widget.
	}
}
~~~

y, en la configuracion del widget indicarias:

		// 'receptorClassName'=>'application.models.MyModel',
		// 'methodName'=>'myFileReceptor',
		// 'userdata'=>$model->primaryKey,

## 6)  File is not received / El archivo no es recibido.

	An internal error occurs, please check log for errors. Coco will write an error log when something is wrong.

	Esto sucede si ha ocurrido un error interno, Coco va a reportar los errores por medio de log errors.

## 7) Extra Options

~~~
[php]
'buttonText'=>'Find & Upload',
'dropFilesText'=>'Drop Files Here !',
'htmlOptions'=>array('style'=>'width: 300px;'),
'defaultControllerName'=>'site',
'defaultActionName'=>'coco',
~~~