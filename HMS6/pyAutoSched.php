<?php
/**
 ICS 499

 Modified version of schedule.php
 Riley Scott
*/
require "db_configuration.php";

$query = "SELECT * FROM autoschedule";

$GLOBALS['scheduleTable'] = mysqli_query($db, $query);



?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Emp Schedule</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/publishersdb.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">





    <style>
        .table td.text {
            max-width: 150px;
        }

        .table td.text span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            max-width: 100%;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
        HMS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <ul class="navbar-nav mr-right">
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <h3 align="center">Employee Schedule View</h3>
    <table class="table table-striped " id="scheduleTable">
    <div class="table responsive">
        <thead>
        <tr>
		    <th>Floor</th>
                    <th>Room</th>
                    <th>Employee</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($scheduleTable->num_rows > 0) {
            // output data of each row
            while($row = $scheduleTable->fetch_assoc()) {

                echo '<tr>
                                          <td> '.$row["Floor"].'</td>
                                          <td> '.$row["Room"]. '</td>
                                          <td> '.$row["Employee"]. '</td>
                                                                               
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
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--Data Tables-->
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript" language="javascript">

    $(document).ready( function () {
        $('#scheduleTable').dataTable();
    } );
</script>
		<form action="touch.php" method="post">
			<input type="submit" class="autoschedule" 
			value="Regenerate Schedule"/>
		</form>
</body>
</html>
