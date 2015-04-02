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
        <script src="js/dataTables.bootstrap.js"></script>
    </head>
    
    <body>
        <?php if ($msg !="") { ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <?php echo $msg; ?>
                    </div>
        <?php } ?>
        
        <h2>Leaves</h2>
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
                ?>
            </tbody>
        </table>
    </body>
    
</html>
