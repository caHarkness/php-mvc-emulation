<?php
    class Application
    {
        static function loadLibraries()
        {
            $varDirectory = scandir("lib");
            unset($varDirectory[0]);
            unset($varDirectory[1]);
            $varDirectory = array_values($varDirectory);

            foreach ($varDirectory as $strFile)
                if (preg_match("#[A-Za-z0-9_\-]*.php#", $strFile))
                    require "lib/$strFile";
        }
    }

    Application::loadLibraries();
    Request::process();
?>