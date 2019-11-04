<?php
/**
 * Created by PhpStorm.
 * User: Sandip
 * Date: 9/28/2018
 * Time: 11:33 PM
 */

include_once 'db_configuration.php';

if (isset($_POST['id'])){

    $update_id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $level = mysqli_real_escape_string($db, $_POST['level']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $facilitator = mysqli_real_escape_string($db, $_POST['facilitator']);
    $required = mysqli_real_escape_string($db, $_POST['required']);
    $optional = mysqli_real_escape_string($db, $_POST['optional']);
    $cadence = mysqli_real_escape_string($db, $_POST['cadence']);
    $time_lower = mysqli_real_escape_string($db, $_POST['time_lower']);
    $time_upper = mysqli_real_escape_string($db, $_POST['time_upper']);
    $contains_demo = mysqli_real_escape_string($db, $_POST['contains_demo']);
    $demo_lead = mysqli_real_escape_string($db, $_POST['demo_lead']);
    $is_optional = mysqli_real_escape_string($db, $_POST['is_optional']);
    $is_safe = mysqli_real_escape_string($db, $_POST['is_safe']);
    $safe_link = mysqli_real_escape_string($db, $_POST['safe_link']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $comments = mysqli_real_escape_string($db, $_POST['comments']);

    $result = $db->query("SELECT * FROM ceremonies WHERE name='$name'");

    if ( $result->num_rows == 0 ) {
        $sql = "INSERT INTO ceremonies(id, name,
                  category, level, description, facilitator,
                 required, optional, cadence,time_lower, 
                 time_upper, contains_demo, demo_lead, is_optional,
                  is_safe, safe_link, status, comments)
                   VALUES ('$update_id','$name','$category','$level',
                   '$description','$facilitator','$required', '$optional', '$cadence',
                   '$time_lower', '$time_upper', '$contains_demo', '$demo_lead', '$is_optional'
                   ,'$is_safe', '$safe_link', '$status', '$comments')
                   ";

        mysqli_query($db, $sql);
        header('location: index.php?CeremonyCreated=Success');
    } else{
        header('location: createCeremonies.php?CeremonyCreated=Failed');
    }




}//end if
?>