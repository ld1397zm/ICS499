<?php

/**
ICS 499
 */
require 'bin/functions.php';
require 'db_configuration.php';


$query = "SELECT * FROM schedule";

$GLOBALS['tableResults'] = mysqli_query($db, $query);
$GLOBALS['hmsTableResults'] = mysqli_query($db, $query);
$GLOBALS['gridResults'] = mysqli_query($db, $query);


?>

<?php $page_title = 'Ceremonies Table'; ?>
<?php include('header.php'); ?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="my-4">
        <?php
        //Display Admin view if an admin is logged in.
        //This gives full access to all CRUD functions
        if (isset($_SESSION['type'])){
            if ($_SESSION['type'] == 'Admin'){
                echo '<h2 class="text-center">Admin Maintenance Mode </h2>';
                ?>
                <style type="text/css">#adminTableview{
                        display:block;
                    }
                </style>
                <style type="text/css">#customerTableView{
                        display:none;
                    }
                </style>
                <style type="text/css">#selector{
                        display:none;
                    }
                </style>
                <?php
            }//end if
        }//end if
        ?>
    </h1>
    <div id="adminTableView">
        <button><a class="btn btn-sm" href="createCeremonies.php">Edit</a></button>
        <table class="table table-striped" id="tableResults">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Employee</th>
                    <th>Occupied</th>
                    <th>Alert</th>
                    <th>Status</th>
                    
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($tableResults->num_rows > 0) {
                    // output data of each row
                    while($row = $tableResults->fetch_assoc()) {
                        echo '<tr>
                            <td>'.$row["id"].'</td>
                            <td class="text"> <span>'.$row["name"].' </span> </td>
                                          <td> '.$row["Floor"].'</td>
                                          <td> '.$row["Room"]. '</td>
                                          <td> '.$row["Employee"]. '</td>
                                          <td> '.$row["Occupied"]. '</td>
                                          <td> '.$row["Alert"]. '</td>     
                                          <td> '.$row["Status"]. '</td>
                                            
                                          <td><a class="btn btn-primary btn-sm" href="viewCeremony.php?name='.$row["name"].'">View</a></td>     
                                          <td><a class="btn btn-warning btn-sm" href="updateCeremonies.php?name='.$row["name"].'">Update</a></td>                                  
                                          <td><a class="btn btn-danger btn-sm" href="deleteCeremony.php?name='.$row["name"].'">Delete</a></td>                                  
                                        </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
                </tbody>
            </div>
        </table>
    </div>

    <div id="scheduleTableView">
        <table class="table table-striped" id="scheduleTable">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Employee</th>
                    <th>Occupied</th>
                    <th>Alert</th>
                    <th>Status</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                if ($scheduleTableResults->num_rows > 0) {
                    // output data of each row
                    while($row = $scheduleTableResults->fetch_assoc()) {

                        echo '<tr>
                            <td>'.$row["id"].'</td>
                            <td class="text"> <span>'.$row["name"].' </span> </td>
                                          <td> '.$row["Floor"].'</td>
                                          <td> '.$row["Room"]. '</td>
                                          <td> '.$row["Employee"]. '</td>
                                          <td> '.$row["Occupied"]. '</td>
                                          <td> '.$row["Alert"]. '</td>
                                          <td> '.$row["Status"]. '</td>
                                                                                  
                                        </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
    <footer class="page-footer text-center">
        <p>Hotel Management System</p>
    </footer>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--Data Table-->
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>


<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        $('#scheduleResults').DataTable( {
            dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv' , 'pdf'
                ] }
        );

        $('#scheduleTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );
    } );
</script>
</body>
</html>
