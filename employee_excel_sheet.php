<?php
include 'php/working_report.php';
 function xlsBOF() {
	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
}
function xlsEOF() {
	echo pack("ss", 0x0A, 0x00);
}
function xlsWriteLabel($Row, $Col, $Value) {
	$L = strlen($Value);
	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
	echo $Value;
} 
// prepare headers information
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=\"employee_excel_sheet.xls\"");
header("Content-Transfer-Encoding: binary");
header("Pragma: no-cache");
header("Expires: 0");
// start exporting
xlsBOF();
// first row 
xlsWriteLabel(0, 0, "Employee Name");
xlsWriteLabel(0, 1, "Designation");
xlsWriteLabel(0, 2, "Actual Monthly Salary");
xlsWriteLabel(0, 3, "Total Working Hours");
xlsWriteLabel(0, 4, "Month Salary");
// second row 
foreach ($data as $d => $report):
    xlsWriteLabel($d+1, 0, $report['username']);
    xlsWriteLabel($d+1, 1, $report['designation']);
    xlsWriteLabel($d+1, 2, $report['actual_salary']);
    xlsWriteLabel($d+1, 3, $report['total_working_hours']);
    xlsWriteLabel($d+1, 4, $report['month_salary']);
endforeach;
// end exporting
xlsEOF();
exit();
?>
