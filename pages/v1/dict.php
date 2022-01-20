<?php
    if (count(Request::getPath()) < 3)
        throw new Exception("Missing dictionary key.");

    Database::query("
        create table if not exists `Dictionary` (
            `Key` text primary key,
            `Value` text
        ) without rowid
    ");

    $strKey = Request::getPath()[2];


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        Database::query(
            "replace into `Dictionary` (
                `Key`,
                `Value`
            ) values (
                ?,
                ?
            );",

            $strKey,
            file_get_contents("php://input"));
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "DELETE")
    {
        Database::query(
            "delete from `Dictionary` where `Key` = ?;",
            $strKey);
    }
    else
    {
        $varRows = Database::query(
            "select * from `Dictionary` where `Key` = ?;",
            $strKey);

        if (sizeof($varRows) > 0)
            $strValue = $varRows[0]["Value"];
        else
        $strValue = null;

        Respond::text($strValue);
    }

    Respond::blank();
?>