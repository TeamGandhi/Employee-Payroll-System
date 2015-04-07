<?php 
include_once "dbConnection.php";
session_start();

if (isset($_GET['month']) && $_GET['month'] !="" && isset($_GET['year']) && $_GET['year'] !="") {
    $current_month = $_GET['month'];
    $current_year = $_GET['year'];
} else {
    $current_month = date('m');
    $current_year = date('Y');
}
$employee = Db::query("SELECT * FROM Employees WHERE Username = ?", $_SESSION["username"]);

$employee_working_hours = Db::query('SELECT * FROM times WHERE YEAR(date) = '.$current_year.' AND MONTH(date) = '.$current_month.' AND employee_id = '.$employee[0]['Id'].'');
//return $employee_working_hours;
?>
