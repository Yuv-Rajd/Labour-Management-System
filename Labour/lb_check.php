<?php
session_start();

include '../includes/connect.php';


if(isset($_POST['login'])){

$id = $_POST['lb_eid'];
$pass = $_POST['lb_pswd'];


if(!empty($id)||!empty($pass)){
    $sql = "SELECT * FROM labours WHERE lb_email='$id' AND lb_pswd='$pass'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count == 0)
		{
		header("location:lb_login.php");
		}
		else
		{
			$_SESSION['id'] = $id;
		header("location:lb_home.php");
            
		}
    }
    else {
		header("location:lb_login.php");
    }
}
