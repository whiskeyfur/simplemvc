<?php
	// A bare bones login service that checks for the appropiate credentials.
	// This can be extended to reach out to google's token service.
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
