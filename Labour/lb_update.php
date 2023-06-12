<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/lb_navbars.php';
?>

<?php

?>
<?php 

$id =  $_SESSION['id'];


$query = "SELECT * FROM labours where labours.lb_email='$id'";
$result = mysqli_query($conn, $query);
        

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $lb_name = $row['lb_name'];
                $lb_email = $row['lb_email'];
                $lb_id = $row['id'];
                $lb_psw = $row['lb_pswd'];
                $lb_about = $row['lb_about'];  
                // echo $lb_about;
            }
        }
            ?>

<form action="lb_SubmitUpdate.php" method="POST" enctype="multipart/form-data">
    <div class="mb-2" class="border">
        <label  class="form-label">Name</label>
        <input type="text" class="form-control" value='<?php echo $lb_name ?>' name="lb_name" required>
        
        <input type="hidden" class="form-control" value='<?php echo $lb_id ?>' name="lb_id">
    </div>
    <div class="mb-1">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" class="form-control"value='<?php echo $lb_email ?>' name="lb_email" required>
    </div>

    <div class="mb-1">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" class="form-control"value='<?php echo $lb_psw ?>' name="lb_pswd" id="exampleInputPassword1" required>
    </div>
    <div class="mb-1">
        <label for="exampleInputPassword1" class="form-label">About</label>
        <input type="text" class="form-control"value='<?php echo $lb_about ?>' name="lb_about" id="exampleInputPassword1" required>
    </div>

    <div class="mb-1 mt-3">
        <label for="exampleInputPassword1" class="form-label">Profile Picture</label>
    </div>
    <input type="file" name="image">
    
    <button type="submit" name="update" class="btn btn-primary">Submit</button>

</form>

<?php
include '../includes/lb_footer.php';
?>