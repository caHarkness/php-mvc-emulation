<?php
    define("ADDRESS", "https://dev.caharkness.com");

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
    // Request::process();

    //
    //  Boot non-SSL users to the root of the site and force SSL
    //
    if (!$_SERVER["HTTPS"])
        header("Location: " . ADDRESS . "/");

    ob_clean();
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/layout.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <?php Alert::js(); ?>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-brand">dev.caharkness.com</span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

                    <?php if (Auth::getUser() == null): ?>
                        <li class="nav-item"><a class="nav-link" href="/user/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/register">Register</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/user/account">Account</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/logout">Logout</a></li>
                    <?php endif; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Tests</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/test/exeption">Test Exception</a>
                            <a class="dropdown-item" href="/test/exeption">JSON Response</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/test/exeption">Test Exception</a>
                            <a class="dropdown-item" href="/test/exeption">JSON Response</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row" id="alert-container">
            <div class="col-sm-4"></div>

            <div class="col-sm-4">
                <div class="alert alert-success" id="alert-message">Hello world!</div>
            </div>

            <div class="col-sm-4"></div>
        </div>

        <?php
            Request::process();
            Alert::render();
        ?>
    </body>
</html>

<?php
    ob_end_flush();
    exit;
?>