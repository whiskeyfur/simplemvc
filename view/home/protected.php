<?php
	http_response_code(401);
	header('WWW-Authenticate: Basic realm="website"');
	
	if (($_SERVER["PHP_AUTH_USER"] == "test") && ($_SERVER["PHP_AUTH_PW"] == "test")) {
		http_response_code(200);
		// and go on to do what you want
	} else {
		// full stop here, this is what will appear on their screen should authentication fail.
		// Make sure you don't do any real processing here, as most browsers give three attempts before failing
		//  that's three hits in this section possible.
	}
?>