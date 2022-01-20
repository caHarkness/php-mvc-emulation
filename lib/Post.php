<?php
    class Post
    {
        //
        //  Check to see if the specified post data exists
        //
        public static function has()
        {
            if (func_num_args() > 0)
            {
                foreach (func_get_args() as $strKey)
                    if (isset($_POST[$strKey]) == false)
                        return false;

                return true;
            }

            return false;
        }

        public static function value($strField)
        {
            if (isset($_POST[$strField]))
                    return $_POST[$strField];
            else    return null;
        }
    }
?>