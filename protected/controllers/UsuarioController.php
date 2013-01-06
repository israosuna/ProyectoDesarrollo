<?php

class UsuarioController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    //Funcion que va a definir la permisologia de cada usuario en el sistema
    public function accessRules() {
        return array(
            array('allow', // permite al usuario no registrado hacer acciones de 'index', 'view' y hacer uso del 'captcha'
                'actions' => array('index', 'view', 'registrar', 'captcha'),
                'users' => array('*'),
            ),
            array('allow', // permite a usuarios autenticados el uso de 'create', 'update' y 'usuario'
                'actions' => array('create', 'update', 'usuario', 'exportXML'),
                'users' => array('@'),
            ),
            array('allow', // permite al usuario acciones de 'admin' y 'delete'
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // si no esta en el sistema no permite realizar ninguna accion
                'users' => array('*'),
            ),
        );
    }

    //Acciones por defectos, generar un captcha. 
    public function actions() {
        return array(
            // accion que renderiza el captcha para ser mostrado en la pagina de registro
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    /**
     * Hace el display del modelo 
     * @param integer $id id del modelo que va a ser mostrado
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Crea un nuevo modelo para usuario.
     * si la creacion es exitosa, el browser redirije hacia view.
     */
    public function actionCreate() {
        $model = new Usuario;

        // realiza las validaciones de ajax
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_usuario));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    //Registro de nuevo Usuario 
    public function actionRegistrar() {
        $model = new Usuario;

        // realiza las validaciones de ajax
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_usuario));
        }

        $this->render('registrar', array(
            'model' => $model,
        ));
    }

    /**
     * Realiza el update de un modelo.
     * si la creacion es exitosa, el browser redirije hacia view.
     * @param integer $id id del modelo que va a ser actualizado
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_usuario));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Elimina un modelo en particular.
     * si la creacion es exitosa, el browser redirije hacia la pagina de admin.
     * @param integer $id id del modelo que va a ser actualizado
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lista todos los modelos.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Usuario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Administrar los modelos.
     */
    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Retorna el data model basado en la clave primaria obtenida por el get
     * si no se encuentra el modelo, se lanza una excepcion HTTP.
     * @param integer $id del modelo que se quiere traer
     */
    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Validaciones en Ajax.
     * @param CModel el modelo a ser validado
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionExportXML($id) {
        $model = Usuario::model()->findByPk($id);
        header('Content-type: application/octet-stream');
        header("Content-Disposition: attachment; filename=" .$model->usuario.'.xml');
        echo $model->exportXML()->saveXML();
    }

}
