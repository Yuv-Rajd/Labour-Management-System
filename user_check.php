<?php
session_start();

include './includes/connect.php';


if(isset($_POST['login'])){

$id = $_POST['user_eid'];
$pass = $_POST['user_pswd'];


if(!empty($id)||!empty($pass)){
    $sql = "SELECT * FROM user WHERE user_email='$id' AND user_pswd='$pass'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count == 0)
		{
		header("location:user_login.php");
		}
		else
		{
			$_SESSION['uemail'] = $id;
		header("location:home.php");
		}
    }
    else {
        echo"
        <script>
        alert('incorrect credentials');
        document.location.href = 'user_login.php';
        </script>"
        ;
		// header("location:user_login.php");
    }
}
