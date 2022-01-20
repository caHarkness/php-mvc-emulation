<?php
    class Text
    {
        public static function startsWith($haystack, $needle)
        {
            return
                $needle === "" ||
                strrpos(
                    $haystack,
                    $needle,
                    -strlen($haystack)
                ) !== false;
        }

        public static function endsWith($haystack, $needle)
        {
            return
                $needle === "" ||
                (
                    ($temp = strlen($haystack) - strlen($needle)) >= 0 &&
                    strpos(
                        $haystack,
                        $needle,
                        $temp
                    ) !== false
                );
        }

        public static function contains($strSubject, $strNeedle)
        {
            return strpos(
                $strSubject,
                $strNeedle
            ) !== false;
        }
    }
?>