<?php 
include "php/leaves_list.php";
?>
<html>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <body>
        <h2>Leaves</h2>
        <table border="0" class="table table-striped table-bordered" id="leaves_list" aria-describedby="example_info">
            <thead>
                <tr>
                    <?php if ($url_info[2] !='employee') { ?>
                        <th>User Name</th>
                    <?php } ?>
                    <th>Name</th>
                    <th>Description</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <?php if ($url_info[2] !='employee') { ?>
                            <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($leaves_list as $leave):  ?>
                    <tr>
                        <?php if ($url_info[2] !='employee') { ?>
                            <td>
                                <?php echo $leave['Username']; ?>
                            </td>
                        <?php } ?>
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
                        <?php if ($url_info[2] !='employee') { ?>
                                <td>
                                    <a href="edit_leave.php?id=<?php echo $leave['id']; ?>">Edit</a>
                                </td>
                        <?php } ?>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </body>
    <script>
        $('#leaves_list').dataTable();
    </script>
</html>
