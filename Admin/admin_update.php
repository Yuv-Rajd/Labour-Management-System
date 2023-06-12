<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>

<?php
if(isset($_POST['update'])){

    $id = $_POST['admin_id'];
    $pass = $_POST['admin_pswd'];
    $cpass = $_POST['admin_cpswd'];

        
    if((!empty($id)||!empty($pass)) && $pass==$cpass){
        $sql = "UPDATE admin  SET admin_pswd='$cpass'WHERE admin.admin_id='$id'";
        $res = mysqli_query($conn,$sql);
        echo '<h3>Succesfully Updated</h3>';   
        }
        else{
        echo '<h3>Incorect credentials</h3>';   
        }
}
?>


<form action="admin_update.php" method="POST">
    <div class="mb-2" class="border">
        <label for="exampleInputEmail1" class="form-label">Admin ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="admin_id" aria-describedby="emailHelp" required>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="admin_pswd" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="admin_cpswd" id="exampleInputPassword1" required>
    </div>
    
    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
</form>

<?php
include '../includes/admin_footer.php';

?>