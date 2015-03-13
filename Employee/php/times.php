<?php

include_once "dbConnection.php";
 session_start();
class Times
{

    static function insertTime($date, $time)
    {
        $employee = Db::query("SELECT * FROM Employees WHERE Username = ?", $_SESSION["username"]);	
        return Db::query("INSERT INTO times (date,time,employee_id) VALUES (?,?,?)", array($date, $time, $employee[0]['Id']));
    }

}

 if (isset($_POST["insert"]))
{

    Times::insertTime($_POST["date"],$_POST["time"]);
}



