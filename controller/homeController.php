<?php
	class homeController extends baseController {
		public function __construct() {
			parent::__construct();
		}
		
		public function index($id = "index", $path = array()) {
			$view = new View("home/$id");
			return $view->render();
		}
		
		
		// This is OPTIONAl, but it allows the controller to handle all errors relating to this controller,
		// It is discovered and installed as the exception handler during setup for the request
		public static function exception_handler($ex) {
			$view = new View("home/error");
			$bag = array(
				"exception" => $ex
			);
			echo $view->render($bag);
		}
		
		public static function class_info() {
			return array(
				"class_name" => "homeController",
				"class_type" => "page controller",
				"git_url" => "https://github.com/whiskeyfur/simplemvc"
			);
		}
	}
?>