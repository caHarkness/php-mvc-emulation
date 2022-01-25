<?php
    Cookie::unset("Token");
    Cookie::set("AlertSuccess", "You were logged out successfully.");
    header("Location: " . ADDRESS . "/user/login");
?>