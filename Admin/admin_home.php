<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>
<?php 
    $q1= "SELECT COUNT(id) AS count FROM labours";
    $r1 = mysqli_query($conn, $q1);
    $row2 = mysqli_fetch_assoc($r1);
    $cnt1 =$row2['count'];

    $q1= "SELECT COUNT(id) AS count FROM work";
    $r1 = mysqli_query($conn, $q1);
    $row2 = mysqli_fetch_assoc($r1);
    $cnt2 =$row2['count'];

    $q1= "SELECT COUNT(id) AS count FROM chats";
    $r1 = mysqli_query($conn, $q1);
    $row2 = mysqli_fetch_assoc($r1);
    $cnt3 =$row2['count'];
?>


<div class="row row-cols-3 g-3 my-2">
<a class="text-decoration-none text-dark" href="admin_lb.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt1; ?></h3>
                <p class="fs-5">Labours</p>
            </div>
            <i class="fas fa-solid fa-users  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    </a>
    <a class="text-decoration-none text-dark" href="admin_workStatus.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt2; ?></h3>
                <p class="fs-5">Works</p>
            </div>
            <i class="fas fa-solid fa-handshake  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    </a>
    <a class="text-decoration-none text-dark" href="admin_chats.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt3; ?></h3>
                <p class="fs-5">Messages</p>
            </div>
            <i class="fa-solid fa-bell fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
        </div>
    </div>
    </a>
    
</div>
<!-- chats  -->
<div class="row">

<div class="col col-lg-12">
    
    <ul class="list-group list-group-flush shadow-sm p-3 mb-5 bg-body-tertiary rounded">
    <h2>Chats</h2>
<?php
 $sql = "SELECT * FROM chats ";
	$res = mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $u_mail = $row['user_mail'];
            $u_msg = $row['user_msg'];
            echo "<li class='list-group-item'><b>$u_mail</b> : $u_msg</li>";
            
        }
    }
    else{
        echo "<li class='list-group-item'>No records found</li>";
    }
        ?>
</ul>
</div>
</div>

<?php
include '../includes/admin_footer.php';

?>