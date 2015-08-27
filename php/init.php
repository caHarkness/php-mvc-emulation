<?php
	$arrParameters = explode(
		"/",
		substr($_GET["data"], 1)
	);

	$arrDirectory = scandir("lib");
	unset($arrDirectory[0]);
	unset($arrDirectory[1]);
	$arrDirectory = array_values($arrDirectory);

	foreach ($arrDirectory as $strFile)
		if (preg_match("#[A-Za-z0-9_\-]*.php#", $strFile))
		{
			// Require or insert the PHP code
			// From the specific file here
			require "lib/$strFile";
		}
?>