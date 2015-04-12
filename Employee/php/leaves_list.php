<?php 
include_once "dbConnection.php";
session_start();
if (isset($_GET['name']) && $_GET['name'] == 'delete') {
    Db::query("DELETE FROM leaves WHERE id=".$_GET['id']."");
    $msg = 'Leave deleted successfully';
    $newURL = '/fw/employee/employee_leaves.php';
    header('Location: '.$newURL);
}
$leaves_list = Db::query("select l.*,e.Username from leaves l left join employees e on l.employee_id = e.id");
return $leaves_list;
?>
