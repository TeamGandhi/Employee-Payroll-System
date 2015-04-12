<?php 
include "php/leaves_list.php";
?>
<html>
    <head>
        <title>Team Gandhi</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <script src="js/employee-data.js"></script>
    </head>
    
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
                            <li><a class="employee_workingHours" href="javascript:void(0);">Get Report</a></li>
                            <li><a href="add_leave.php">Add Leave</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a id="menuLogout" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container" id="pagecontent">
            <h2>Leaves</h2><br/>
            <table border="0" class="table table-striped table-bordered" id="leaves_list" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($leaves_list)) {
                        foreach ($leaves_list as $leave):  ?>
                            <tr>
                                <td>
                                    <?php echo $leave['name']; ?>
                                </td>
                                <td>
                                    <?php echo $leave['description']; ?>
                                </td>
                                <td>
                                    <?php echo $leave['from_date']; ?>
                                </td>
                                <td>
                                    <?php echo $leave['to_date']; ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($leave['status'] == 'P') {
                                            echo 'Pending';
                                        } else if ($leave['status'] == 'A') {
                                            echo 'Approved';
                                        } else if ($leave['status'] == 'R') {
                                            echo 'Rejected';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary delete_leave" onclick='confirm_delete("<?php echo $leave['id']; ?>","<?php echo $leave['name']; ?>"); return false;'>Delete</button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    <script>
        /***** Employee Working Hours List  ******/
        $(".employee_workingHours").click(function(){
            var currentMonth = (new Date).getMonth() + 1;
            var currentYear = (new Date).getFullYear();
            window.location.href = 'employee_working_hours.php?month='+currentMonth+'&year='+currentYear;
        });
        /* TO delete leave */
        function confirm_delete(leave_id,leave_name) {
            var msg=confirm("Are you sure you want to delete " + leave_name + " ?");
            if (msg==true)
            {
              window.location.href = 'php/leaves_list.php?id='+leave_id+'&name=delete';
            }
        }

        /* To display table */
        $('#leaves_list').dataTable();
    </script>
</html>
