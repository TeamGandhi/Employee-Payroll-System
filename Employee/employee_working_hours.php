<?php 
    include 'php/working_hours_list.php';
    $months = array(
        '1' => 'January', '2' => 'february', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August',
        '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    );
    $year = date('Y');
?>
<title>Team Gandhi</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<body>
    <!-- navigation bar container -->
    <div class="container" id="pagecontent">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/fw/employee">Home</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/fw/employee">Add Daily Report</a></li>
                        <li><a href="add_leave.php">Add Leave</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="menuLogout" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <!-- To Get Months List -->
        <select id="month">
            <?php
                foreach ($months as $m => $month): ?>
            <option value="<?php echo $m; ?>" <?php if($_GET['month'] == $m) { echo 'SELECTED';} ?>><?php echo $month; ?></option>
            <?php
                endforeach;
            ?>
        </select>
        <!-- To Get Years List -->
        <select id="year">
            <option value="<?php echo ($year-1); ?>" <?php if($_GET['year'] == ($year-1)) { echo 'SELECTED';} ?>><?php echo ($year-1); ?></option>
            <option value="<?php echo $year; ?>" <?php if($_GET['year'] == ($year-1)) { echo 'SELECTED';} ?>><?php echo $year; ?></option>
        </select>
        <?php
            if (!empty($data)) {
                echo '<button id="generate_report">Generate Report</button>';
            }
        ?>
    </div>
    <div class="container" id="empoyee_working_hours_content">
        <h2>Employee Monthly Report</h2>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="working_hours" aria-describedby="example_info">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Working Hours</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($employee_working_hours)) {
                    foreach ($employee_working_hours as $working_hours): ?>
                        <tr>
                            <td>
                                <?php echo $working_hours['date']; ?>
                            </td>
                            <td>
                                <?php echo $working_hours['time']; ?>
                            </td>
                            <td>
                                <?php echo $working_hours['timeout']; ?>
                            </td>
                            <td>
                                <?php echo $working_hours['hours']; ?>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        /* For Table */
        $('#working_hours').dataTable();
        /* Change Month value */
        $("#month").change(function(){
            var month_val = $("#month").val();
            var year_val = $("#year").val();

            $.get("php/working_hours_list.php", 
                {month:month_val, year:year_val},
                function(data){
                    window.location.href = 'employee_working_hours.php?month='+month_val+'&year='+year_val;
                });
       });
       /* Change year Value */
       $("#year").change(function(){
            var month_val = $("#month").val();
            var year_val = $("#year").val();

            $.get("php/working_hours_list.php", 
                {month:month_val, year:year_val},
                function(data){
                    window.location.href = 'employee_working_hours.php?month='+month_val+'&year='+year_val;
            });
       });
    </script>
</body>
