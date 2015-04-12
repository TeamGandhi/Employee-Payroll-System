<?php 
include_once "dbConnection.php";
session_start();
if (isset($_POST["insert"])) {
    $employee = Db::query("INSERT INTO leaves (employee_id,user_id, name,description,from_date,to_date,status) VALUES (?,?,?,?,?,?,?)", array($_POST['employee_id'], $_POST['user_id'], $_POST['name'], $_POST['description'],$_POST['from_date'],$_POST['to_date'],'P'));
    return true;
}
$query = "SELECT Id,Username FROM users";
$users_list = Db::query($query) or die ('Error updating database: '.mysql_error());

?>
