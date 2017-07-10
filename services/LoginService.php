<?php
	class LoginService {
		function __construct() {
			if (!session_id()) session_start();
		}
		
		function __destruct() {
			
		}
		
		function login($user, $pass) {
			throw new Exception("Function not implemented.");
		}
		
		function logout() {
			throw new Exception("Function not implemented.");
		}
	}
?>
