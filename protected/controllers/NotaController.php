<?php

class NotaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // OPERACIONES CRUD
		);
	}

	/**
	 * Reglas de Control de datos.
	 * este metodo es usado por el filtro 'accessControl' .
        */

        public function actions() {
            return array(
                
                'coco' => array(
                    'class' => 'CocoAction',
                ),
            );
        }
	
        
        
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(

			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','coco','delete','admin'),
				'users'=>array('@'),
			),
			array('allow', // permite acciones admin y borrar
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // rechaza todos los usarios
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Muestra un modelo en especifico
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creacion de Modelo.
	 * si la creacion se hace se redirecciona al index.
	 */
	public function actionCreate()
	{
		$model=new Nota;

		// Uncomment the following line if AJAX validation is needed
	        $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
		        $model->hash_etiquetas= $_POST['Nota']['hash_etiquetas'];

                        if($model->save())
				$this->redirect(array('update','id'=>$model->id_nota));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Modifica el modelo.
	 * redirecciona al index
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			$model->hash_etiquetas= $_POST['Nota']['hash_etiquetas'];
                        if($model->save())
				$this->redirect(array('view','id'=>$model->id_nota));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * borra el modelo.
	 * redirecciona al index
         *  */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// solo se permite via POST
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lista Los modelos.
	 */
	public function actionIndex()
	{
            
             if (!isset($_GET['id_libreta']))
             {
		$dataProvider = new CActiveDataProvider('Nota', array(
                    'criteria' => array(
                        'condition' => 'id_libreta in (Select id_libreta from libreta where id_usuario=' . Yii::app()->user->id_usuario.')',
                    ),
                    'pagination' => array(
                        'pageSize' => 2 ,
                    ),
                ));
             }
             
             else {
              
		$dataProvider = new CActiveDataProvider('Nota', array(
                    'criteria' => array(
                        'condition' => 'id_libreta='.$_GET['id_libreta'],
                    ),
                    'pagination' => array(
                        'pageSize' => 2,
                    ),
                ));   
             }
             
             if(isset($_GET['buscar'])) {
                 $dataProvider = new CActiveDataProvider('Nota', array(
                    'criteria' => array(
                        'condition' => 
                        "( contenido like '%".$_GET['buscar']."%'".
                        " or id_nota in (select id_nota from etiqueta_nota where id_etiqueta in (select id_etiqueta from etiqueta where nombre like '%".$_GET['buscar']."%') )".
                        " ) and id_libreta in (Select id_libreta from libreta where id_usuario=" . Yii::app()->user->id_usuario.")",
                    ),
                    'pagination' => array(
                        'pageSize' => 2 ,
                    ),
                ));
                 
                 
             }
             
             
             
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Maneja los modelos.
	 */
	public function actionAdmin()
	{
		$model=new Nota('search');
		$model->unsetAttributes();  // Borra los valores por defecto
		if(isset($_GET['Nota']))
			$model->attributes=$_GET['Nota'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * devuelve el modelo de datos de acuerdo al id que se recibe por via GET.
	 * si no se encuentra se envia una excepcion HTTP.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Nota::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * validaciones AJAX.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
