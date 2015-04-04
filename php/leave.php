<?php 
include_once "dbConnection.php";
session_start();

if (isset($_POST["update"])) {
    $id = $_POST['leave_id'];
    $employee_id = $_POST['employee_id'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $status = $_POST['status'];
    $query = "UPDATE leaves SET 
                employee_id='$employee_id',
                user_id='$user_id',
                name='".$name."',
                description='$description',
                from_date='$from_date',
                    to_date='$to_date',
                        status='$status'
            WHERE id='$id'";
    Db::query($query);
    return true;
}
$leave_status = array('P' => 'Pending', 'A' => 'Aprroved', 'R' => 'Rejected');
$leave = Db::query("SELECT * FROM leaves WHERE id=".$_GET['id']."");

$query = "SELECT Id,Username FROM users";
$users_list = Db::query($query) or die ('Error updating database: '.mysql_error());
return $users_list;
?>
