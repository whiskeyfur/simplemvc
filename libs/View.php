<?php
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