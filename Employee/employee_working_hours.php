
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
            </select>
      
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
               
            </tbody>
        </table>
    </div>
    
</body>
