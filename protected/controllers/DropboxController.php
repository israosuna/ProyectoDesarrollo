<?php

class DropboxController extends Controller {
/**
 *Guarda el token autenficado de Dropbox en la base de datos.
 *  
 */
    public function actionIndex() {

        $tokens = Yii::app()->user->getState('tokens');

        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
            $account = $dropbox->getAccountInfo();

           // $info = $dropbox->getMetaData('/');
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            //echo $error;
            $this->redirect('Dropbox/Authorize');
            
        }

        spl_autoload_register(array('YiiBase', 'autoload'));
        
        $usertoken= Usuario::model()->findByPk(Yii::app()->user->id_usuario);
        $usertoken->token= serialize($tokens);
        $usertoken->save(FALSE);
            
        //$this->redirect('index');
        Yii::app()->request->redirect(Yii::app()->baseUrl.'/site/index');
        
        
    }
/**
 *Hace una peticion de autentificacion OAuth y se envia a dropbox  
 */
    public function actionAuthorize() {
        $nextUrl = 'http://' . Yii::app()->request->getServerName() . $this->createUrl('Authorize_step2');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            // Guide through OAuth workflow...
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $tokens = $oauth->getRequestToken();
            $url = $oauth->getAuthorizeUrl($nextUrl);
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            echo $error;
        }
        spl_autoload_register(array('YiiBase', 'autoload'));
        Yii::app()->user->setState('tokens', $tokens);

        echo "<script>window.location=\"$url\";</script>";
    }
    
 /**
  *Recibe la respuesta de dropbox para la aplicacion 
  */
    public function actionAuthorize_step2() {
        $tokens = Yii::app()->user->getState('tokens');
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);
            $tokens = $oauth->getAccessToken();
            $oauth->setToken($tokens);
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            //echo $error;
        }
        spl_autoload_register(array('YiiBase', 'autoload'));
        Yii::app()->user->setState('tokens', $tokens);
        $this->redirect('index');
    }
   /**
    *Sube un archivo de prueba para DropBox. 
    */
    public function actionSubir(){
        
         $model=new ArchivoAdjunto();
        if(isset($_POST['ArchivoAdjunto']))
        {
            $model->attributes=$_POST['ArchivoAdjunto'];
            $model->file=CUploadedFile::getInstance($model,'file');
            $model->file->saveAs('assets/'.$model->file->name);
            $model->subirArchivo('assets/'.$model->file->name, '');
            if($model->save())
            {
               
                // redirect to success page
            }
            else{
                
                echo "no se pudo guardar";
            }
            
        }
        $this->render('subir', array('model'=>$model));
    }
   public function actionGetThumb(){
       $ruta =$_GET['ruta'];
       $tokens = Yii::app()->user->getState('tokens');

        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
            $thumb=$dropbox->getThumbnail($ruta);
            
            $info = $dropbox->getMetaData('/');
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            echo $error;
           // $this->redirect('dropbox/Authorize');
        }
        
        spl_autoload_register(array('YiiBase', 'autoload'));
        
        
        // We'll be outputting a PDF
header('Content-type: image');
        echo $thumb;
       
       
   }
public function actionItsDropboxUp(){
    $response='';
    $response= @file_get_contents('https://www.dropbox.com');
    if($response){
        Yii::app()->request->redirect(Yii::app()->baseUrl.'/site/index');
        
    }
    
    else {
        $this->render('/site/error',array('message'=>'Verificar Conexion de Red'));
        Yii::log('error en la conexion de la red a nivel de DropboxController', CLogger::LEVEL_WARNING);
        
    }
}
    public function actionDownload(){
       $ruta =$_GET['ruta'];
       $tokens = Yii::app()->user->getState('tokens');

        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
            $download=$dropbox->getFile($ruta);
            
            $info = $dropbox->getMetaData('/');
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            echo $error;
           // $this->redirect('dropbox/Authorize');
        }
        
        spl_autoload_register(array('YiiBase', 'autoload'));
        
        
        // We'll be outputting a PDF
header('Content-type: application/octet-stream');
    header("Content-Disposition: attachment; filename=".substr($ruta, stripos($ruta,'/')+1));
        echo $download;
       
       
   }
}
