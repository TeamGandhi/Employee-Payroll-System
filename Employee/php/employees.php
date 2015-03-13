<?php

include_once "dbConnection.php";

class Employees
{

    static function updateEmployee($employeeId, $username, $firstName, $lastName, $salary, $phone, $password, $designation, $address)
    {
        return Db::query("UPDATE Employees SET Username = ?, FirstName = ?, LastName = ?, Salary = ?, Phone = ?, Password = ?, Designation = ?, Address = ? WHERE Id = ?", array($username, $firstName, $lastName, $salary, $phone, $password, $designation, $address, $employeeId));
    }

}

 if (isset($_POST["update"]))
{
    Employees::updateEmployee($_POST["id"], $_POST["username"],$_POST["firstName"],$_POST["lastName"],$_POST["phone"],$_POST["password"],$_POST["address"]);
}
