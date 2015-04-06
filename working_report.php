<?php include 'php/working_report.php';
    $months = array(
        '1' => 'January', '2' => 'february', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August',
        '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    );
    $year = date('Y');
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<body>
    <h1>Employee Payrolls List</h1>
    <br>
    <div class="container">
        <!-- To Get Months List -->
        <select id="month">
            <?php
                foreach ($months as $m => $month): ?>
                    <option value="<?php echo $m; ?>"><?php echo $month; ?></option>
            <?php
                endforeach;
            ?>
        </select>
        <!-- To Get Years List -->
        <select id="year">
            <option value="<?php echo ($year-1); ?>"><?php echo ($year-1); ?></option>
            <option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
            <option value="<?php echo ($year+1); ?>"><?php echo ($year+1); ?></option>
        </select>
        <?php
            if (!empty($data)) {
                echo '<button id="generate_report">Generate Report</button>';
            }
        ?>
    </div>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="working_report" aria-describedby="example_info">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Actual Monthly Salary</th>
                    <th>Total Working Hours</th>
                    <th>Month Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $report): ?>
                    <tr>
                        <td>
                            <?php echo $report['username']; ?>
                        </td>
                        <td>
                            <?php echo $report['designation']; ?>
                        </td>
                        <td>
                            <?php echo $report['actual_salary']; ?>
                        </td>
                        <td>
                            <?php 
                                if ($report['total_working_hours'] !="") {
                                    echo $report['total_working_hours'];
                                } else {
                                    echo '0';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($report['month_salary'] !="") {
                                    echo $report['month_salary'];
                                } else {
                                    echo '0';
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            var month = '<?php echo $_GET['month']; ?>'; 
            if(month !=""){
               $('#month').val(month);
            }
            var year = '<?php echo $_GET['year']; ?>';
            if(year !=""){
               $('#year').val(year);
            }
            /* Change Month value */
            $("#month").change(function(){
                var month_val = $("#month").val();
                var year_val = $("#year").val();
                
                $.get("php/working_report.php", 
                    {month:month_val, year:year_val},
                    function(data){
                        window.location.href = 'employee_working_report.php?month='+month_val+'&year='+year_val;
                    });
           });
           /* Change year Value */
           $("#year").change(function(){
                var month_val = $("#month").val();
                var year_val = $("#year").val();
                
                $.get("php/working_report.php", 
                    {month:month_val, year:year_val},
                    function(data){
                        window.location.href = 'employee_working_report.php?month='+month_val+'&year='+year_val;
                    });
           });
           
           $("#generate_report").click(function(){
                var month_val = $("#month").val();
                var year_val = $("#year").val();
                window.location.href = 'employee_excel_sheet.php?month='+month_val+'&year='+year_val;
           });
        });
    </script>
</body>
