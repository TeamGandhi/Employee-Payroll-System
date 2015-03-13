<?php

include_once "dbConnection.php";
 session_start();
class Employees
{

    static function updateEmployee($username, $firstName, $lastName, $salary, $phone, $password, $address)
    {
    	$employee = Db::query("SELECT * FROM Employees WHERE Username = ?", $_SESSION["username"]);
    	$username = strlen($username) > 0 ? $username : $employee[0]['Username'];
    	$password = strlen($password) > 0 ? $password : $employee[0]['Password'];
    	$firstName = strlen($firstName) > 0 ? $firstName : $employee[0]['FirstName'];
    	$lastName = strlen($lastName) > 0 ? $lastName : $employee[0]['LastName'];
    	$salary = strlen($salary) > 0 ? $password : $employee[0]['Salary'];
    	$phone = strlen($phone) > 0 ? $phone : $employee[0]['Phone'];
    	$address = strlen($address) > 0 ? $address : $employee[0]['Address'];

    	$employeeId = $employee[0]['Id'];
    	
        return Db::query("UPDATE Employees SET Username = ?, FirstName = ?, LastName = ?, Salary = ?, Phone = ?, Password = ?, Address = ? WHERE Id = ?", array($username, $firstName, $lastName, $salary, $phone, $password, $address, $employeeId));
    }

}

 if (isset($_POST["update"]))
{

    Employees::updateEmployee($_POST["username"],$_POST["firstName"],$_POST["lastName"],$_POST["salary"],$_POST["phone"],$_POST["password"],$_POST["address"]);
}


