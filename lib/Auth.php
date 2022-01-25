<?php
    class Auth
    {
        public static function getUser()
        {
            $strToken = Cookie::get("Token");
            $varRows = Database::query("sp_GetUserFromToken.sql", $strToken);

            if (count($varRows) > 0)
                return $varRows[0];
            else
            return null;
        }

        public static function getUserFromEmail($strEmail)
        {
            $varRows = Database::query("select * from `user` where `email` like ? limit 1", $strEmail);

            if (count($varRows) > 0)
                return $varRows[0];
            else
            return null;
        }

        public static function filter()
        {
            if (self::getUser() == null)
            {
                header("Location: " . ADDRESS . "/user/login");
                Cookie::set("AlertDanger", "You need to be signed in to access that page.");
            }
        }
    }
?>