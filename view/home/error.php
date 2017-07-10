<?php
	$code = $bag["exception"]->getCode();
	if (!$code) {
		http_response_code(500); // Something REALLY went bad if we got this one.
	} else {
		http_response_code($code); 
	}
	echo htmlentities($bag["exception"]->getMessage());
?>