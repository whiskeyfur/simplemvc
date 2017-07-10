<?php
	
	error_reporting(E_ALL);

	// Set the auto load so I don't have to do include_once all over the place and break things if those files move
	// This also allows me to not worry about going into the parent directories. I'll have no need to.
	spl_autoload_register(
			function ($class) {
			$dirs = array("controller", "model", "libs", "services");
			foreach ($dirs as $dir) {
				if (file_exists(__dir__ . "/$dir/$class.php")) {
					include_once(__dir__ . "/$dir/$class.php");
					return true;
				}
			}
			return false;
		}
	);
	
	function exception_handler($ex) {
		$view = new View("home/error");
		$bag = array(
			"exception" => $ex,
			"http_status" => $ex->getCode()
		);
		echo $view->render($bag);
	};


	include_once("libs/rb.php");
	include_once("config/default.php");

	//print_r($_SERVER);
	if (isset($_SERVER["PATH_INFO"])) {
		$path = explode("/", $_SERVER["PATH_INFO"]);
		array_shift($path); // lose that leading slash
	} else {
		$path = array("home", "index");
	}
	
	$ctrl = array_shift($path) or "home";
	$ctrl = $ctrl . "Controller";
	$id = array_shift($path) or "index";
	
	if (class_exists($ctrl)) {
		
		$controller = new $ctrl();
		
		if (method_exists($controller, "exception_handler")) {
			set_exception_handler("$ctrl::exception_handler");
		} else {
			set_exception_handler("exception_handler");
		};
		
		
		if (method_exists($controller, $id)) {
			echo $controller->$id();
		} elseif (method_exists($controller, "index")) {
			echo $controller->index($id);
		} else {
			throw new Exception("Missing Page. '". $_SERVER["REQUEST_URI"] . "' does not exist here. ", 404);
		}
		
	} else {
		throw new Exception("Missing Controller. '". $_SERVER["REQUEST_URI"] . "' does not exist here. ", 404);
	};
?>