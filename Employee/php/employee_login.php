<?php

include_once "dbConnection.php";

class Employee_login
{
    static function login($username, $password)
    {
        $employees = Db::query("SELECT * FROM employees WHERE Username = ? AND Password = ?", array($username, $password));
        return count($employees) > 0;
    }
}
?>
