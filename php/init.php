<?php
	// This "init.php" script gets called per every request,
	// Be careful what you call here!

	// This line is important!
	// We will divy up the GET uri to process
	// Parameters in an MVC like fashion.
	$arrParameters = explode("/", substr($_GET["data"], 1));

	// Navigate to the home view if
	// No view or parameters are passed
	if ($arrParameters[0] == "")
		header("Location: http://git.caharkness.com/php-mvc-emulation/view/home");

	// NOTE: Since the home view does not exist,
	// The logic in "index.php" will redirect you
	// To "/view/404".
?>