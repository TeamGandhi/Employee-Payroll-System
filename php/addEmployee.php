<?php
include_once("dbConnection.php");

if(isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["contactNumber"]) && isset($_GET["userName"]) && isset($_GET["password"]) && isset($_GET["salary"])){
	
	$firstName  = $_GET["firstName"];
	$lastName  = $_GET["lastName"];
	$userName  = $_GET["userName"];
	$password  = $_GET["password"];
	$contactNumber  = $_GET["contactNumber"];
	$salary  = $_GET["salary"];
	
	$insertQuery = "INSERT INTO employeeDetails (userName, password, contactNumber, firstName, lastName, salary) VALUES ('$userName', '$password', '$contactNumber', '$firstName', '$lastName', '$salary')";
	
	if($conn->query($insertQuery)){
		print json_encode(array("status"=>"200", "message"=>"Employee added successfully"));
	}else{
		die(json_encode(array("status"=>"201", "message"=>"Unable to add the employee")));
	}
	
}else{
	die(json_encode(array("status"=>"201", "message"=>"Incomplete input parameters")));
}
?>