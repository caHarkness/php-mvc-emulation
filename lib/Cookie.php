<?php
    class Cookie
    {
        public static function get($strKey)
        {
            if (isset($_COOKIE[$strKey]))
                return $_COOKIE[$strKey];
            else
            return null;
        }

        public static function set($strKey, $strValue)
        {
            setcookie(
                $strKey,
                $strValue,
                time() + 60 * 60 * 24 * 30,
                "/");
        }

        public static function unset($strKey)
        {
            setcookie(
                $strKey,
                "",
                time() - 3600,
                "/");
        }
    }
?>