<?php 
session_start();
$id =  $_SESSION['id'];
?>
<style>
    body{
        font-family: serif;
        font-size:20px;
    }
    .ci{
    border-radius: 50%;
    align-self: center;
    width: 150px;
    height: 150px;
    object-fit: cover;
    }
    .topnav{
        box-shadow: 8px 5px 15px #c5c2c2;
    }
    .adcontent{
    height: 100vh;
}
</style>
<body >
    <div class="container-fluid ">
        <div class="row adcontent">
            <!-- Sidebar -->
            <div class=" col-lg-2 bg-dark text-light">
                <div class="py-4">
                    <div class="d-flex justify-content-center">
                        <img src="../static/images/22.jpg" class="card-img  ci" alt="Admin">
                    </div>
                    <h4 class="text-center fs-2"><i class="fa-solid fa-user-tie"></i><a href="admin_update.php" class="text-decoration-none text-light"><?php echo ' '.$id;?> </a></h4>
                    <ul class="nav flex-column">
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link mt-5 text-light" href="admin_home.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="admin_lb.php">
                            <i class="fa-solid fa-user"></i> view Labour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="admin_workStatus.php"><i class="fa-solid fa-layer-group"></i> Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="admin_chats.php">
                            <i class="fa-solid fa-comment"></i> Chat</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Bar -->
            <div class="col-lg-10 bg-light">
                <div class="topnav py-4 d-flex justify-content-between align-items-center">
                <a class="text-decoration-none text-dark" href="admin_home.php">
                    <h1 class="mx-2"><b>| Labour Management System</b></h1></a>
                    <button class="btn"><a class="text-decoration-none fs-4 p-3 text-dark " href="logout.php">|LogOut <i class="fa-solid fa-right-to-bracket"></i></a></button>
                </div>
                <hr>
                <div class="container mt-4">
