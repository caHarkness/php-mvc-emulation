<?php
	try
	{
		if (count($arrParameters) > 1)
		{
			$strFile =
				"pages/" . 
				$arrParameters[0] . "/" .
				$arrParameters[1] . ".php";

			if (file_exists($strFile))	{ require $strFile; }
			else						{ throw new Exception(); }
		}
		else if (count($arrParameters) == 1)
		{
			$strFile =
				"pages/" . 
				$arrParameters[0] .
				"/index.php";

			if (file_exists($strFile))	{ require $strFile; }
			else						{ throw new Exception(); }
		}
		else
		{
			if (file_exists("pages/index.php"))	{ require "pages/index.php"; }
			else								{ throw new Exception(); }
		}
	}
	catch (Exception $x)
	{
		exit;
	}
?>