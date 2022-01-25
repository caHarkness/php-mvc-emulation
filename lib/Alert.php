<?php
    class Alert
    {
        public static $strSuccess = "";
        public static $strWarning = "";
        public static $strDanger = "";

        public static function js()
        {
            ?>
                <script>
                    $(function() {
                        $("#alert-container").hide();
                    });

                    fncAlertSuccess = function(strMessage)
                    {
                        $("#alert-message")
                            .removeClass("*")
                            .addClass("alert alert-success")
                            .text(strMessage);

                        $("#alert-container")
                            .hide()
                            .fadeIn(400);
                    };

                    fncAlertWarning = function(strMessage)
                    {
                        $("#alert-message")
                            .removeClass("*")
                            .addClass("alert alert-warning")
                            .text(strMessage);

                        $("#alert-container")
                            .hide()
                            .fadeIn(400);
                    };

                    fncAlertDanger = function(strMessage)
                    {
                        $("#alert-message")
                            .removeClass("*")
                            .addClass("alert alert-danger")
                            .text(strMessage);

                        $("#alert-container")
                            .hide()
                            .fadeIn(400);
                    };
                </script>
            <?php
        }

        public static function success($strMessage)
        {
            self::$strSuccess = $strMessage;
        }

        public static function warning($strMessage)
        {
            self::$strWarning = $strMessage;
        }

        public static function danger($strMessage)
        {
            self::$strDanger = $strMessage;
        }

        public static function render()
        {
            if (Cookie::get("AlertSuccess") != null)
            {
                self::success(Cookie::get("AlertSuccess"));
                Cookie::unset("AlertSuccess");
            }

            if (Cookie::get("AlertWarning") != null)
            {
                self::success(Cookie::get("AlertWarning"));
                Cookie::unset("AlertWarning");
            }

            if (Cookie::get("AlertDanger") != null)
            {
                self::success(Cookie::get("AlertDanger"));
                Cookie::unset("AlertDanger");
            }

            ?>
                <?php if (strlen(self::$strSuccess) > 0): ?>
                    <script>
                        $(function() {
                            fncAlertSuccess("<?=self::$strSuccess;?>");
                        });
                    </script>
                <?php endif; ?>

                <?php if (strlen(self::$strWarning) > 0): ?>
                    <script>
                        $(function() {
                            fncAlertWarning("<?=self::$strWarning;?>");
                        });
                    </script>
                <?php endif; ?>

                <?php if (strlen(self::$strDanger) > 0): ?>
                    <script>
                        $(function() {
                            fncAlertDanger("<?=self::$strDanger;?>");
                        });
                    </script>
                <?php endif; ?>
            <?php
        }
    }
?>