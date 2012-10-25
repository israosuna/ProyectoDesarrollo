<?php

DEFINE('consumerKey', 'itvelkigj22p5rw');
DEFINE('consumerSecret', 'q75ilu33vozx423');

class DropboxController extends Controller {

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

            $info = $dropbox->getMetaData('/ProyectoDesarrollo');
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            //echo $error;
            $this->redirect('dropbox/Authorize');
        }

        spl_autoload_register(array('YiiBase', 'autoload'));

        echo "NOMBRE: " . $account['display_name'] . "<br/>";
        echo "EMAIL: " . $account['email'] . "<br/>";
        echo "PAIS: " . $account['country'] . "<br/>";
        echo " <br/>";

        echo "......LIST..... <br/>";

        foreach ($info['contents'] as $file) {
            $filename= basename($file['path']);
            $fileesize= $file['size'];
            $fullfilesize= $file['path'];
            $dropbox->getThumbnail($file['path'],'small','dropbox');
            echo('          <li class="fileListItem"><span class="fileImage">&nbsp;</span><span class="fileName">' .
                          $filename . '</span><span class="fileSize">' . $filesize . "</span></li>\n");
 
//            echo " - ARCHIVO: " . $file['path'];
//            echo " - ES CARPETA: " . (($file['is_dir']) ? 'SI' : 'NO');
//            echo " - TAMAÑO: " . $file['size'];
            echo " <br/>";
        }
                
    }

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
}
