<?php
session_start();
$id = $_POST['admin_id'];
$pass = $_POST['admin_pswd'];

include '../includes/connect.php';

if(!empty($id)||!empty($pass)){
    $sql = "SELECT * FROM admin WHERE admin_id='$id' AND admin_pswd='$pass'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count == 0)
		{
		header("location:admin_login.php");
		}
		else
		{
			$_SESSION['id'] = $id;
		header("location:admin_home.php");
            
		}
    }
    else {
		header("location:admin_login.php");
    }
