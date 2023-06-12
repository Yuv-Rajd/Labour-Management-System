<?php 
    include '../includes/header.php';
    include '../includes/connect.php';
?>
<?php 

if(isset($_POST['register'])){
	

	$name = $_POST['lb_name'];
	$id = $_POST['lb_email'];
	$pass = $_POST['lb_psw'];
	$cat = $_POST['cat'];  

    $targetFile2 = './static/images/uploads/';
    $targetFile2 .= "" .$name;
    $targetFile2 .= "." .'jpg';


    $targetFile ='../static/images/uploads/';
    $targetFile .= "" .$name;
    $targetFile .= "." .'jpg';


    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($imageFileType, $allowedExtensions)) {
        echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
        exit;
    }


    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

        $sql = "SELECT * FROM labours WHERE lb_email='$id' AND lb_pswd='$pass'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
            if($count >0)
                {
                    echo "<h5 class='text-danger text-center'>User Email already exist!!</h5>";
                }
                else
                {
                    if($count == 0){
                        $sql = "INSERT INTO labours (`id`, `lb_name`, `lb_email`, `lb_pswd`, `ctg_id`,`image_path`) VALUES (NULL, '$name', '$id', '$pass', '$cat','$targetFile2')";
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
    <h2 class="mb-5 text-center">Construction Management System</h2>
<div class="albd col-lg-12 d-flex justify-content-center align-items-center" >
<div class="col-lg-4 border rounded bg-light m-5 p-5 mt-5 mb-auto">

<h4>Login Account</h4>
<form action="lb_check.php" method="POST">
    <div class="mb-2" class="border">
        <label for="exampleInputEmail1" class="form-label">Email ID</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="lb_eid" aria-describedby="emailHelp" required>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="lb_pswd" id="exampleInputPassword1" required>
    </div>
    
    <a class="ma text-decoration-none btn btn-dark" href="../index.php">GO BACK</a>
    <button type="submit"name="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
</form>
</div>

<!-- register  -->
<div class="col-lg-6 border rounded bg-light mt-auto p-5  mb-auto">
<h4>Register Account</h4>
<form class="row" action="lb_login.php" method="POST" enctype="multipart/form-data">

<div class="col-lg-12 col-md-6">
    <label  class="form-label">Name</label>
    <input type="text" name="lb_name" class="form-control" required>
</div>

<div class="col-md-12">
    <label  class="form-label">email</label>
    <input name="lb_email" type="email" class="form-control" required>
</div>

<div class="col-md-12">
    <label  class="form-label">Password</label>
    <input type="password" name="lb_psw" class="form-control" required>
</div>


<div class="col-md-6">
    <label class="form-label">Category</label>
    <select name="cat" class="form-select dark">
    <option value="1">Painter</option>
    <option value="2">Plumber</option>
    <option value="3">Electrician</option>
    <option value="4">Carpenter</option>
    <option value="5">Helper</option>
    </select>
</div>
<div class="col-md-6">
    <label  class="form-label">Profile image</label>
    <input type="file" name="image" class="form-control" required>
</div>

<div class="col-md-12 mt-2">
    <a class=" ma text-decoration-none btn btn-dark" href="../index.php">GO BACK</a>
    <button type="submit"name="register" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
    
</div>
</form>
</div>

</div>
</body>
</html>