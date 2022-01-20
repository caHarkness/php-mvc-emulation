<?php
    class Respond
    {
        public static function status($intCode, $strReason)
        {
            $intCode = intval($intCode);

            ob_clean();
                header(trim("HTTP/1.0 {$intCode} {$strReason}"));
                header("Content-Type: text/plain");
                echo "{$intCode} {$strReason}";
            ob_end_flush();
            exit;
        }

        public static function exception($x)
        {
            ob_clean();
                header("Content-Type: text/plain");
                echo json_encode(
                    array(
                        "error" => $x->getMessage(),
                        "error_code" => $x->getCode(),
                        "error_file" => $x->getFile(),
                        "error_line" => $x->getLine(),
                        "path" => Request::getPath()),
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            ob_end_flush();
            exit;
        }

        public static function text($varInput)
        {
            ob_clean();
                header("Content-Type: text/plain");
                echo $varInput;
            ob_end_flush();
            exit;
        }

        public static function json($varInput)
        {
            ob_clean();
                header("Content-Type: application/json");
                echo json_encode($varInput, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            ob_end_flush();
            exit;
        }

        public static function redirect($strLocation)
        {
            ob_clean();
                header("Location: $strLocation");

                if (func_num_args() > 2)
                {
                    Cookie::set(
                        func_get_arg(1),
                        func_get_arg(2));
                }
            ob_end_flush();
            exit;
        }

        public static function blank()
        {
            ob_clean();
            ob_end_flush();
            exit;
        }

        public static function file($strPath)
        {
            $varPathParts    = explode("/", $strPath);
            $strLastPathPart = $varPathParts[count($varPathParts) - 1];
            $strFileName     = $strLastPathPart;

            ob_clean();
            header("Content-Type: " . mime_content_type($strPath));
            header("Content-Disposition: attachment; filename={$strFileName}");
            define("CHUNK_SIZE", 1024 * 1024);

            $varBuffer = "";
            $varFile   = fopen($strPath, "rb");

            if ($varFile === false)
                return false;

            while (!feof($varFile))
            {
                $varBuffer = fread($varFile, CHUNK_SIZE);
                echo $varBuffer;

                ob_flush();
                flush();
            }

            $varStatus = fclose($varFile);

            ob_end_flush();
            exit;
        }

        public static function download($strPath)
        {

            ob_clean();
                header("Content-Type: application/force-download");
                echo file_get_contents($strPath);
            ob_end_flush();
            exit;
        }
    }
?>