<?php
    if (Post::has("email", "password", "repeat"))
    {
        if (Post::value("password") !== Post::value("repeat"))
            Alert::danger("The passwords do not match.");
        else
        {
            if (count(Database::query("select `email` from `user` where `email` like ?", Post::value("email"))) > 0)
                Alert::danger("The e-mail address already exists in our database.");
            else
            {
                $strSalt = uniqid(mt_rand(), true);
                $strHash = md5(Post::value("password") . $strSalt);
                $strToken = uniqid(mt_rand(), true);

                Database::query("
                    insert into `user` (
                        `email`,
                        `hash`,
                        `salt`,
                        `token`,
                        `created`
                    ) values (?, ?, ?, ?, datetime('now'))",
                    Post::value("email"),
                    $strHash,
                    $strSalt,
                    $strToken);

                Cookie::set("Token", $strToken);
            }
        }

    }
?>

<div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-4">
        <form action="/user/register" method="POST">
            <div class="form-group">
                <label>E-mail Address</label>
                <input class="form-control" type="text" placeholder="email@address.com" name="email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="password123" name="password">
            </div>

            <div class="form-group">
                <label>Repeat Password</label>
                <input class="form-control" type="password" placeholder="password123" name="repeat">
            </div>

            <button class="btn btn-primary" type="submit">Register</button>
        </form>
    </div>

    <div class="col-sm-4"></div>
</div>