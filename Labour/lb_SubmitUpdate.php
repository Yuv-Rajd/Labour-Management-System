<?php
include '../includes/connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = '../static/images/uploads/';

    $lb_name = $_POST['lb_name'];



    $targetFile ='../static/images/uploads/';
    $targetFile .= "" .$lb_name;
    $targetFile .= "." .'jpg';

  



    // Check if the file is a valid image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($imageFileType, $allowedExtensions)) {
        echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
        exit;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo 'File uploaded successfully.';
        $lb_name = $_POST['lb_name'];
        $lb_email = $_POST['lb_email'];
        $lb_id = $_POST['lb_id'];
        $lb_psw = $_POST['lb_pswd'];
        $lb_about = $_POST['lb_about'];

        $targetFile2 = './static/images/uploads/';
        $targetFile2 .= "" .$lb_name;
        $targetFile2 .= "." .'jpg';


        $sql = "UPDATE labours  SET lb_name='$lb_name',lb_email='$lb_email',lb_pswd='$lb_psw',image_path='$targetFile2',lb_about='$lb_about' WHERE labours.id='$lb_id'";
        $res = mysqli_query($conn,$sql);
        echo 'success';
        session_start();
        header("location:../index.php");


    } else {
        echo 'Error uploading file.';
    }
}

?>
