<?php

DEFINE('consumerKey','itvelkigj22p5rw');
DEFINE('consumerSecret', 'q75ilu33vozx423');

class DropboxController extends Controller
{
	public function actionIndex()
	{
	   $tokens=Yii::app()->user->getState('tokens');
	   
	   spl_autoload_unregister(array('YiiBase','autoload'));
	   $dropbox = Yii::getPathOfAlias('ext.dropbox');     
	   include ( $dropbox.DIRECTORY_SEPARATOR.'autoload.php');
       try {
           $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
		   $oauth->setToken($tokens);
		   
           $dropbox = new Dropbox_API($oauth); 
		   
           $info = $dropbox->getAccountInfo();
		   
		   echo "NOMBRE: ".$info['display_name']."<br/>";
		   echo "EMAIL: ".$info['email']."<br/>";
		   echo "PAIS: ".$info['country']."<br/>";
		   		
			echo " <br/>";
           $info = $dropbox->getMetaData('/');
		   echo "......LIST..... <br/>";
		   foreach( $info['contents'] as $file  ){
				echo " - ARCHIVO: ".$file['path'];
				echo " - ES CARPETA: ". (($file['is_dir'])?'SI':'NO');
				echo " - TAMAÑO: ".$file['size'];				
				echo " <br/>";
		   }
		   
       } catch (Exception $e) {
           $error = "error: " . $e->getMessage();
		   echo $error;
		   //$this->redirect('Authorize');
       }

       spl_autoload_register(array('YiiBase','autoload'));
	}
	
	public function actionAuthorize(){	
	   $nextUrl='http://'.Yii::app()->request->getServerName().$this->createUrl('Authorize_step2');
	   spl_autoload_unregister(array('YiiBase','autoload'));
	   $dropbox = Yii::getPathOfAlias('ext.dropbox');     
	   include ( $dropbox.DIRECTORY_SEPARATOR.'autoload.php');
       try {
			// Guide through OAuth workflow...
			$oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
			$tokens = $oauth->getRequestToken();
			$url= $oauth->getAuthorizeUrl($nextUrl);
       }catch (Exception $e) {
           $error = "error: " . $e->getMessage();
		   echo $error;
       }
       spl_autoload_register(array('YiiBase','autoload'));
	    Yii::app()->user->setState('tokens',$tokens);
		
	   echo "<script\">window.location=\"$url\";</script>";			
	}

	public function actionAuthorize_step2(){
	   $tokens=Yii::app()->user->getState('tokens');	   
	   spl_autoload_unregister(array('YiiBase','autoload'));
	   $dropbox = Yii::getPathOfAlias('ext.dropbox');     
	   include ( $dropbox.DIRECTORY_SEPARATOR.'autoload.php');
       try {
			$oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);			
			$oauth->setToken($tokens);
			$tokens = $oauth->getAccessToken();
			$oauth->setToken($tokens);			
       } catch (Exception $e) {
           $error = "error: " . $e->getMessage();
		   echo $error;
       }
       spl_autoload_register(array('YiiBase','autoload'));	   
	   Yii::app()->user->setState('tokens',$tokens);
		   $this->redirect('index');
	}
}