<?php 
    include './includes/header.php';
    include './includes/connect.php';
?>
<?php 

if(isset($_POST['register'])){
	

	$name = $_POST['user_name'];
	$id = $_POST['user_email'];
	$pass = $_POST['user_psw'];

    $targetFile2 = './static/images/user_images/';
    $targetFile2 .= "" .$name;
    $targetFile2 .= "." .'jpg';


    $targetFile ='./static/images/user_images/';
    $targetFile .= "" .$name;
    $targetFile .= "." .'jpg';


    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($imageFileType, $allowedExtensions)) {
        echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
        exit;
    }


    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

        $sql = "SELECT * FROM user WHERE user_email='$id' AND user_pswd='$pass'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
            if($count >0)
                {
                    echo "<h5 class='text-danger text-center'>User Email already exist!!</h5>";
                }
                else
                {
                    if($count == 0){
                        $sql = "INSERT INTO user (`id`, `user_name`, `user_email`, `user_pswd`,`user_img`) VALUES (NULL, '$name', '$id', '$pass','$targetFile2')";
                        $res = mysqli_query($conn,$sql);
                        echo "<h5 class='text-success text-center'>User Registered Succesfully, Login Now!!</h5>";
                        
                    }
                    
                }
    }
    else{
        echo "<h5 class='text-danger text-center'>Error: Try Again!!</h5>";
    }


	}
?>



<body >
    <h2 class="mb-5 text-center">Labour Management System</h2>
<div class="auserd col-lg-12 d-flex justify-content-center align-items-center" >
<div class="col-lg-4 border rounded bg-light m-5 p-5 mt-5 mb-auto">

<!-- login  -->
<h4>Login Account</h4>
<form action="user_check.php" method="POST">
    <div class="mb-2" class="border">
        <label for="exampleInputEmail1" class="form-label">User Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="user_eid" aria-describedby="emailHelp" required>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="user_pswd" id="exampleInputPassword1" required>
    </div>
    
    <a class="ma text-decoration-none btn btn-dark" href="./index.php">GO BACK</a>
    <button type="submit"name="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
</form>
</div>

<!-- register  -->
<div class="col-lg-6 border rounded bg-light mt-auto p-5  mb-auto">
<h4>Register Account</h4>
<form class="row" action="user_login.php" method="POST" enctype="multipart/form-data">

<div class="col-lg-12 col-md-6">
    <label  class="form-label">Name</label>
    <input type="text" name="user_name" class="form-control" required>
</div>

<div class="col-md-12">
    <label  class="form-label">Email</label>
    <input name="user_email" type="email" class="form-control" required>
</div>

<div class="col-md-12">
    <label  class="form-label">Password</label>
    <input type="password" name="user_psw" class="form-control" required>
</div>


<div class="col-md-6">
    <label  class="form-label">Profile image</label>
    <input type="file" name="image" class="form-control" required>
</div>

<div class="col-md-12 mt-2">
    <a class=" ma text-decoration-none btn btn-dark" href="./index.php">GO BACK</a>
    <button type="submit"name="register" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>

</div>
</form>
</div>

</div>
</body>
</html>