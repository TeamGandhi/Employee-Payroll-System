<?php

include_once "dbConnection.php";

class Employees
{
    static function getEmployees()
    {
        return Db::query("SELECT * FROM Employees");
    }

    static function getEmployee($employeeId)
    {
        $result = Db::query("SELECT * FROM Employees WHERE Id = ?", $employeeId);
        return $result[0];
    }

    static function addEmployee($firstName, $lastName, $salary)
    {
        return Db::query("INSERT INTO Employees (FirstName, LastName, Salary) VALUES (?, ?, ?)", array($firstName, $lastName, $salary));
    }

    static function updateEmployee($employeeId, $firstName, $lastName, $salary)
    {
        return Db::query("UPDATE Employees SET FirstName = ?, LastName = ?, Salary = ? WHERE Id = ?", array($firstName, $lastName, $salary, $employeeId));
    }

    static function deleteEmployee($employeeId)
    {
        return Db::query("DELETE FROM Employees WHERE Id = ?", $employeeId);
    }
}

if (isset($_POST["add"]))
{
    Employees::addEmployee($_POST["firstName"],$_POST["lastName"],$_POST["salary"]);
}
else if (isset($_POST["remove"]))
{
    Employees::deleteEmployee($_POST["id"]);
}
else if (isset($_POST["update"]))
{
    Employees::updateEmployee($_POST["id"], $_POST["firstName"],$_POST["lastName"],$_POST["salary"]);
}
else if (isset($_POST["list"]))
{
    echo json_encode(Employees::getEmployees());
}
else if (isset($_POST["get"]))
{
    echo json_encode(Employees::getEmployee($_POST["id"]));
}
