<?php 
include_once "dbConnection.php";
session_start();
$leaves_list = Db::query("select l.*,e.Username from leaves l left join employees e on l.employee_id = e.id");
return $leaves_list;
?>
