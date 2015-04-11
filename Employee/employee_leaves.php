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
                    
                </tbody>
            </table>
        </div>
    </body>
