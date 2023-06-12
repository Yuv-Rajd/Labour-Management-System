<?php 
session_start();
$id =  $_SESSION['id'];

$query = "SELECT * FROM labours where labours.lb_email='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $img = $row['image_path'];
            $name = $row['lb_name'];
        }
    }
    else{

    }
        ?>

<style>

.ci{
    border-radius: 50%;
    align-self: center;
    width: 150px;
    height: 150px;
    object-fit: cover;
    }
    .topnav{
        box-shadow: 8px 5px 15px #c5c2c2;
    }.adcontent{
    height: 100vh;
}
</style>

<body >
    <div class="container-fluid ">
        <div class="row adcontent">
            <!-- Sidebar -->
            <div class="col-lg-2 bg-dark text-light">
                <div class="py-4">
                    <div class="d-flex justify-content-center">
                        <img src=".<?php echo $img; ?>" class="card-img  ci" alt="<?php echo $id;?>">
                    </div>
                <h4 class="text-center fs-2"><i class="fa-solid fa-award"></i> <?php echo $name;?> </h4>
                <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link mt-5 text-light" href="lb_home.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="lb_work.php"><i class="fa-solid fa-layer-group"></i> Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="lb_review.php"><i class="fa-solid fa-wand-magic-sparkles"></i> Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-3 text-light" href="lb_update.php"><i class="fa-solid fa-camera-retro"></i> Update Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Bar -->
            <div class=" col-lg-10 bg-light ">
                <div class="topnav py-4 d-flex justify-content-between align-items-center">
            <a class="text-decoration-none text-dark" href="lb_home.php">
                    <h1 class="mx-2"><i class="fa-solid fa-hands"></i> Labours Management System</h1></a>
                    <button class="btn"><a class="text-decoration-none p-3 text-dark " href="logout.php">|LogOut <i class="fa-solid fa-right-to-bracket"></i></a></button>
                </div>
                <hr>
                <div class="container mt-4">
