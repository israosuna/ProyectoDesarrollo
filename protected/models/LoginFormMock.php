<?php

class LoginFormMock extends LoginForm {
    public $authenticateWasCalled = false;
    public $loginWasCalled = false;

    public function authenticate($attribute,$params)

                {
        $this->authenticateWasCalled= true;
        
        }

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
            $this->loginWasCalled= true;
            
            return true;
	}
}

?>