<?php 
    include '../includes/header.php';
?>



<body class="albd col-lg-12 d-flex justify-content-center align-items-center">
<div class="col-lg-4 border rounded bg-warning m-5 p-5 mt-5 mb-auto">

<h4 class="mb-5 text-center">Construction Management System</h4>
<form action="admin_check.php" method="POST">
    <div class="mb-2" class="border">
        <label for="exampleInputEmail1" class="form-label">Admin ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="admin_id" aria-describedby="emailHelp" required>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="admin_pswd" id="exampleInputPassword1" required>
    </div>
    
    <a class="ma text-decoration-none btn btn-dark" href="../index.php">GO BACK</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
</form>
</div>

</body>
</html>