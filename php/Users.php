<?php

include_once "dbConnection.php";

class Users
{
    static function login($username, $password)
    {
        $users = Db::query("SELECT * FROM Users WHERE Username = ? AND Password = ?", array($username, $password));
        return count($users) > 0;
    }
}
?>
