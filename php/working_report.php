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
/* EMployees list */
$employees_list = Db::query("Select * FROM employees");
$working_report = array();
$actual_monthly_hours = 24*8;

foreach ($employees_list as $r => $employee):
    $working_report[$r]['total_working_hours'] = '';
    $employees_working_report = Db::query("SELECT * FROM `times` WHERE YEAR(date) = ".$current_year." AND MONTH(date) = ".$current_month." AND employee_id =".$employee['Id']);
    $working_report[$r]['id'] = $employee['Id'];
    $working_report[$r]['username'] = $employee['Username'];
    $working_report[$r]['actual_salary'] = $employee['Salary'];
    $working_report[$r]['designation'] = $employee['Designation'];
    $tax = $employee['Salary']*(26/100);
    $working_report[$r]['without_tax_salary'] = $employee['Salary']-$tax;
    foreach ($employees_working_report as $report):
        $working_report[$r]['total_working_hours'] += $report['hours'];
    endforeach;
endforeach;

$data = array();
foreach ($working_report as $val):
    $val['month_salary'] = $val['without_tax_salary']*($val['total_working_hours']/$actual_monthly_hours);
    $data[] = $val;
endforeach;
return $data;
?>
