<?php
/**
ICS 499
 */
include_once 'db_configuration.php';

if (isset($_GET['name'])){

    $name = mysqli_real_escape_string($db, $_GET['name']);


    $sql = "DELETE FROM ceremonies
            WHERE name = '$name'";

    mysqli_query($db, $sql);
    header('location: index.php?CeremonyDeleted=Success');
}//end if
?>

