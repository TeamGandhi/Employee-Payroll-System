<?php

include_once "dbConnection.php";
 session_start();
    class Times
    {

        static function insertTime($date, $timeIn,$timeOut,$working_hours)
        {
            $employee = Db::query("SELECT * FROM Employees WHERE Username = ?", $_SESSION["username"]);
            Db::query("INSERT INTO times (date,time, timeout,hours,employee_id) VALUES (?,?,?,?,?)", array($date, $timeIn, $timeOut, $working_hours,$employee[0]['Id']));
            return $employee[0]['Id'];
        }

    }
    //Find total num of hours worked
    function timeDifference($timeEnd, $timeStart){
      $tResult = strtotime($timeEnd) - strtotime($timeStart);
      return date("G:i", $tResult);
    }
    
    if (isset($_POST["insert"])) {
        $working_hours = timeDifference($_POST['timeOut'], $_POST["timeIn"]);
        Times::insertTime($_POST["date"],$_POST["timeIn"],$_POST['timeOut'],$working_hours);
    }




