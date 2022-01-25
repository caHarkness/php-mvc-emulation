<?php
    if (Post::has("email", "password"))
    {
        $varUser = Auth::getUserFromEmail(Post::value("email"));

        if ($varUser == null)
            Alert::warning("No user with the supplied e-mail address was found.");
        else
        {
            $strHash = md5(Post::value("password") . $varUser["salt"]);

            if (strcmp($strHash, $varUser["hash"]) != 0)
                Alert::danger("The password does not match our records.");
            else
            {
                $strToken = uniqid(mt_rand(), true);

                Database::query("
                    update `user`
                    set
                        token = ?
                    where
                        email = ? and
                        hash = ?",
                    $strToken,
                    $varUser["email"],
                    $varUser["hash"]);

                Cookie::set("Token", $strToken);
                header("Location: " . ADDRESS . "/user/account");

                Cookie::set("AlertSuccess", "You were logged in successfully.");
            }
        }
    }
?>

<div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-4">
        <form action="/user/login" method="post">
            <div class="form-group">
                <label>E-mail Address</label>
                <input class="form-control" type="text" placeholder="email@address.com" name="email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="password123" name="password">
            </div>

            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>

    <div class="col-sm-4"></div>
</div>