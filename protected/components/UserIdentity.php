<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            
            $user= Usuario::model()->find('usuario=:username',array(':username'=>  $this->username));
            
            
           if ($user && $user->clave==$this->password){
     		$this->errorCode=self::ERROR_NONE;
                Yii::app()->user->setState('id_usuario',$user->id_usuario);

               
           }
           else {
               
		$this->errorCode=self::ERROR_USERNAME_INVALID;

           }
            
		return !$this->errorCode;
	}
}