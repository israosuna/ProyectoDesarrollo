<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // validacion mediante CAPTCHA
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
           
            'page' => array(
                'class' => 'CViewAction',
            ),
            'coco' => array(
                'class' => 'CocoAction',
            )
        );
    }

    /**
     * 
     * 
     */
    public function actionIndex() {
        // renderiza el archivo view 'protected/views/site/index.php'
        //  layout por defecto 'protected/views/layouts/main.php'
       $tokens = Yii::app()->user->getState('tokens');

        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
            $account = $dropbox->getAccountInfo();

        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            $this->redirect('Dropbox/Authorize');
            
        }

        spl_autoload_register(array('YiiBase', 'autoload'));
        $this->render('index');
    }

    /**
     * Manejo de excepciones.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Muestra la pagina de CONTACT
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     *Filtro para controlar acceso a la aplicacion
     * @return type 
     */
    public function filters()
	{
		return array(
			'accessControl', // Control de Acceso para los CRUD
			'postOnly + delete', // las acciones de borrar solo por POST
		);
	}

    
   /**
    *Validando que Todo usuario deba estar registrado.
    * @return type 
    */
    public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('login'),
				'users'=>array('*'),
			),

			array('allow', // permite la navegacion en la pagina.
				'actions'=>array('coco','index','contact','about','logout','captcha','usuario','page','libreta','nota','dropbox'),


				'users'=>array('@'),
			),
			array('allow', // permite al usuario las acciones de borrar.
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // rechaza los usuarios
				'users'=>array('*'),
			),
		);
	}
    
    
    /**
     * Muestra la Pagina de Login
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if para la peticion de ajax 
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // Recolecta los datos ingresados
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // valida los datos y redirecciona
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // muestra el formulario de login
        $this->render('login', array('model' => $model));
    }

    /**
     * Pagina para cerrar sesion y enviar al HomePage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}