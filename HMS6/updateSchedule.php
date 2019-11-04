<?php
/**
 * Created by PhpStorm.
 * User: Sandip
 * Date: 9/27/2018
 * Time: 11:35 PM
 */
?>


<?php $page_title = 'Update Ceremony'; ?>
<?php include('header.php'); ?>
<div class="container">

<?php
include_once 'db_configuration.php';

if (isset($_GET['name'])){

    $name = $_GET['name'];

    $sql = "SELECT * FROM ceremonies
            WHERE name = '$name'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="updateTheCeremony.php" method="POST">
    <br>
    <h3>Update Ceremony of : '.$row["name"].' </h3> <br>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" required>
    </div>
    <div class="form-group col-md-8">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" readonly>
    </div>
  </div>
  
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="category">Category</label>
          <input type="text" class="form-control" name="category" value="'.$row["category"].'"  maxlength="255">
        </div>
        
        <div class="form-group col-md-4">
          <label for="level">Level</label>
          <input type="text" class="form-control" name="level" value="'.$row["level"].'"  maxlength="255" >
        </div>
        
        <div class="form-group col-md-4">
          <label for="facilitator">Facilitator</label>
          <input type="text" class="form-control" name="facilitator" value="'.$row["facilitator"].'"  maxlength="255">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" value="'.$row["description"].'"  maxlength="255">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="required">Required</label>
          <input type="text" class="form-control" name="required" value="'.$row["required"].'"  maxlength="255">
        </div>
        
        <div class="form-group col-md-6">
          <label for="optional">Optional</label>
          <input type="text" class="form-control" name="optional" value="'.$row["optional"].'"  maxlength="255" >
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="cadence">Cadence</label>
          <input type="text" class="form-control" name="cadence" value="'.$row["cadence"].'"  maxlength="255">
        </div>
        
        <div class="form-group col-md-4">
          <label for="time_lower">Time Lower</label>
          <input type="text" class="form-control" name="time_lower" value="'.$row["time_lower"].'"  maxlength="255" >
        </div>
        
        <div class="form-group col-md-4">
          <label for="time_upper">Time Upper</label>
          <input type="text" class="form-control" name="time_upper" value="'.$row["time_upper"].'"  maxlength="255">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="contains_demo">Contains Demo?</label>
          <input type="text" class="form-control" name="contains_demo" value="'.$row["contains_demo"].'"  maxlength="255">
        </div>
        
        <div class="form-group col-md-4">
          <label for="demo_lead">Demo Lead</label>
          <input type="text" class="form-control" name="demo_lead" value="'.$row["demo_lead"].'"  maxlength="255" >
        </div>
        
        <div class="form-group col-md-4">
          <label for="is_optional">Is Optional?</label>
          <input type="text" class="form-control" name="is_optional" value="'.$row["is_optional"].'"  maxlength="255">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="is_safe">Is SAFe?</label>
          <input type="text" class="form-control" name="is_safe" value="'.$row["is_safe"].'"  maxlength="255">
        </div>
        <div class="form-group col-md-8">
          <label for="safe_link">SAFe Link</label>
          <input type="text" class="form-control" name="safe_link" value="'.$row["safe_link"].'"  maxlength="255" >
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="status">Status</label>
          <input type="text" class="form-control" name="status" value="'.$row["status"].'"  maxlength="255">
        </div>
        
        <div class="form-group col-md-6">
          <label for="comments">Comments</label>
          <input type="text" class="form-control" name="comments" value="'.$row["comments"].'"  maxlength="255" >
        </div>
    </div>
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update Ceremony</button>
    </div>
    <br> <br>
    
    </form>';

    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


