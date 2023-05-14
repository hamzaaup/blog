<?php
/**
* The login page model
*/
require_once 'config/database.php';

class LoginModel extends Config{
	public function login($email, $password) {
		$row = $this->select("*", "admin", "email='" . $email . "' AND password='" . $password . "'");
		return $row;
	}
}
?>