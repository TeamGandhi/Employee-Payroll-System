<?php 
include_once "dbConnection.php";
session_start();
$employee = Db::query("SELECT * FROM Employees WHERE Username = ?", $_SESSION["username"]);

$employee_working_hours = Db::query('SELECT * FROM times WHERE employee_id = ?', $employee[0]['Id']);
return $employee_working_hours;
?>
