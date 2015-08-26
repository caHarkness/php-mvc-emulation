<?php
	require "php/init.php";
?>

<!DOCTYPE html>

<html>
	<head>
		<?php require "php/css.php"; ?>
		<?php require "php/js.php"; ?>
	</head>

	<body>
		<?php require "php/header.php"; ?>

		<?php
			try
			{
				// Let's look for the specified controller
				// And its associated action.

				// For example, when looking at "/view/404",
				// We will look for a folder called "view",
				// And try and include "404.php" in the body.
				$strFile =
					"php/" . 
					$arrParameters[0] . "/" .
					$arrParameters[1] . ".php";

				if (file_exists($strFile))
				{
					require $strFile;
				}
				else
				{
					throw new Exception;
				}
			}
			catch (Exception $x)
			{
				// NOTE: If "404.php" does not exist in the "view"
				// Folder, there will be an endless redirect loop!
				header("Location: /view/404");
			}
		?>

		<?php require "php/footer.php"; ?>
	</body>
</html>