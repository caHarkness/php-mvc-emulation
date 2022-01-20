<?php
    ob_clean();
    header("Content-Type: text/plain");
    
    echo json_encode(
        Request::getArgs(),
        JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    ob_end_flush();
    exit;
?>