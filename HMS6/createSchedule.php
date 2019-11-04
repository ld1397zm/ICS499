<?php
/**
ICS 499
 */
?>


<?php $page_title = 'Create Schedule'; ?>
<?php include('header.php'); ?>

<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['CeremonyCreated'])){
        if($_GET["CeremonyCreated"] == "Failed"){
            echo '<br><h3 class="bg-danger">A employee with the NAME already exists. Please try again with a new NAME! </h3>';
        }
    }

    ?>
    <form action="createTheSchedule.php" method="POST">
        <br>
        <h3>Create New Schedule: </h3> <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id">Floor</label>
                <input type="text" class="form-control" name="Floor"   maxlength="5" required>
            </div>
            <div class="form-group col-md-8">
                <label for="name">Room</label>
                <input type="text" class="form-control" name="Room"  maxlength="64" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="category">Employee</label>
                <input type="text" class="form-control" name="Employee"   maxlength="20">
            </div>

            <div class="form-group col-md-4">
                <label for="level">Occupied</label>
                <input type="text" class="form-control" name="Occupied" maxlength="30" >
            </div>

            <div class="form-group col-md-4">
                <label for="facilitator">Alert</label>
                <input type="text" class="form-control" name="Alert"  maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description">Status</label>
                <input type="text" class="form-control" name="Status"  maxlength="255">
            </div>
        </div>

        <br>
        <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Schedule</button>
        </div>
        <br> <br>

    </form>
</div>

