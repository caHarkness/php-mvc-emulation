<?php
    class Auth
    {
        public static function getUser()
        {
            return
            $_SERVER["PHP_AUTH_USER"];
        }

        public static function getPassword()
        {
            return
            $_SERVER["PHP_AUTH_PW"];
        }

        public static function getKey() { return Auth::getUser(); }
        public static function getSecret() { return Auth::getPassword(); }

        public static function isAuthenticated()
        {
            //
            //  Replace with SQL
            //

            if (Auth::getUser() == "conner" && Auth::getPassword("badpassword"))
                return true;

            return false;
        }
    }
?>