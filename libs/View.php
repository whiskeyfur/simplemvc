<?php
	// This class really should not be touched unless you intend to change the look and feel for the ENTIRE application
	// This does affect views that might also return a non-html mime type, like an excel document or text file.
	// Try to implement your changes in a view before going site wide.
	class View {
		private $path;
		
		public function __construct($path) {
			if (file_exists("view/$path.php")) {
				$this->path = $path;
			} else {
				throw new Exception("Missing View", 404);
			}
		}
		
		public function render($bag = array()) {
			ob_start();
			include_once("view/" . $this->path . ".php");
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
	}
?>