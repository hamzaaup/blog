<?php
/**
* The blog page controller
*/
class LoginController
{
    private $model;
    //We will pass model object to controller here
    function __construct($model)
    {
    	session_start();
        $this->model = $model;
    }

    public function index()
    {
        if (isset($_POST['login_request'])) {
			if ($_POST['email'] && $_POST['password']) {
				$getRow = $this->model->login($_POST['email'], $_POST['password']);
				if ($getRow) {
					$_SESSION['admin_id'] = $getRow['id'];
					$this->login_status = 1;
					$this->login_message = "<div class='alert alert-success'>You have logged in successfully. Thank you!</div>";
				} else {
					$this->login_message = "<div class='alert alert-danger'>You have entered invalid email OR password! Try again</div>";
				}
			} else {
				$this->login_message = "<div class='alert alert-warning'>Please provide email and password!</div>";
			}
		} else {
			$this->login_message = "<div class='alert alert-warning'>please submit valid fields and submit logins!</div>";
		}
    }

}