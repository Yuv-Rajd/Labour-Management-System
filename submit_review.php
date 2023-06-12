<?php

include './includes/connect.php';

if(isset($_POST['rv'])){

    $rt = $_POST['rating'];
    $rv = $_POST['review'];
    $email = $_POST['user_email'];
    $lb_id = $_POST['lb_id'];


    echo $rt;
    echo $rv;  
    echo $email;
    echo "<script>alert('Ratigs submitted')</script>";

    // $sql = "SELECT * FROM reviews WHERE lb_id='$lb_id'";
	// $res = mysqli_query($conn,$sql);
	// $count = mysqli_num_rows($res);
	
	// 	if($count >0)
	// 		{
    // if((!empty($id)||!empty($pass)) && $pass==$cpass){
        $sql = "INSERT INTO `reviews` (`id`, `lb_id`, `user_email`, `lb_rating`, `lb_remarks`) VALUES (NULL, '$lb_id', '$email', '$rt', '$rv');";
        $res = mysqli_query($conn,$sql);
        echo '<h3>Succesfully Updated</h3>';   
        
        header("location:home.php");
        }
        else{
        echo '<h3>Incorect credentials</h3>';
        }
// }
?>