<?php 
include "php/leave.php";
$current_year = date('Y');
$current_month = date('m');
?>
    <head>
        <title>Team Gandhi</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="js/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
        <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/employee-data.js"></script>
    </head>
    <body>
        <div class="container">
         <header id="header" class="header col-lg-12">
            <h1> <small>Employee Payroll System</small></h1>
         </header>
    </div>
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
                        <li><a href="employee_leaves.php">Leaves</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="menuLogout" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        <!-- update info -->
        <div class="container page" id="pageAddLeaveInfo" style="display: block;">
            <section class="col-lg-offset-4 col-lg-4">
              <h2>Leave Application</h2>
                <form method="post" id="add_leave_form">
                    <input type="hidden" id="employee_id" value="<?php echo $_SESSION['id']; ?>" />
                    <!-- Name -->
                   <div class="form-group">
                      <input type="text" class="form-control" id="name" placeholder="Name">
                      <div class="error" id="leave_name"></div>
                   </div>
                    <!-- Description -->
                   <div class="form-group">
                       <textarea type="text" id="description" class="form-control" placeholder="Description"></textarea>
                       <div class="error" id="leave_description"></div>
                   </div>
                    <!-- From Date -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="from_date" placeholder="From Date">
                        <div class="error" id="leave_from_date"></div>
                    </div>
                    <!-- To Date -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="to_date" placeholder="To Date">
                        <div class="error" id="leave_to_date"></div>
                    </div>
                    <!-- Admins List -->
                   <div class="form-group">
                       <select id="user_id">
                           <option value="">Select User</option>
                           <?php
                           if (!empty($users_list)) {
                                foreach ($users_list as $user): 
                            ?>
                                <option value="<?php echo $user['Id']; ?>"><?php echo $user['Username']; ?></option>
                           <?php
                                endforeach;
                           }
                           ?>
                       </select>
                       <div class="error" id="leave_user"></div>
                   </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="AddLeaveInfo" class="btn btn-default">Submit
                            </button>
                        </div>
                    </div>
              </form>
            </section>
        </div>
        <script>
            /** Submit Add Leave **/
            $('#AddLeaveInfo').click(function(){
                var name = $("#name").val();
                var description = $("#description").val();
                var user_id = $("#user_id").val();
                var from_date = $("#from_date").val();
                var to_date = $("#to_date").val();
                var employee_id = $("#employee_id").val();
                if (name !="" && description !="" && user_id !="" && from_date !="" && to_date !="") {
                    $.post("php/leave.php", 
                        {name: name, description:description, user_id:user_id, employee_id:employee_id,from_date:from_date, to_date:to_date,insert:true},
                        function(data){
                            window.location.href = '/fw/employee/employee_leaves.php';
                        });
                } else {
                    if (name =="") {
                        $("#leave_name").html('Please enter name');
                    } else {
                        $("#leave_name").html('');
                    }
                    if (description =="") {
                        $("#leave_description").html('Please enter description');
                    } else {
                        $("#leave_description").html('');
                    }
                    if (user_id =="") {
                        $("#leave_user").html('Please select user name');
                    } else {
                        $("#leave_user").html('');
                    }
                    if (from_date =="") {
                        $("#leave_from_date").html('Please enter from date');
                    } else {
                        $("#leave_from_date").html('');
                    }
                    if (to_date =="") {
                        $("#leave_to_date").html('Please enter to date');
                    } else {
                        $("#leave_to_date").html('');
                    }
                }
            }); 

        </script>
    </body>
    </html>
