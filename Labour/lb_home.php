<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/lb_navbars.php';
?>

<?php
$id =  $_SESSION['id'];

$query = "SELECT labours.id,lb_name,lb_email,cat_name FROM labours,category where labours.lb_email='$id' and labours.ctg_id = category.id";
        $result = mysqli_query($conn, $query);
        
        // Check if any results were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Retrieve column values
                $col1 = $row['lb_name'];
                $col2 = $row['lb_email'];
                $col3 = $row['cat_name'];
                $l_id = $row['id'];
                $_SESSION['lbrid'] = $l_id;
            }
        }
        else{
            echo 'no records found';
        }
        
    $query2= "SELECT COUNT(id) AS count FROM work WHERE lb_id = $l_id AND work.status = 'task done'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $cnt1 =$row2['count'];

    $query3= "SELECT COUNT(id) AS count FROM work WHERE lb_id = $l_id AND work.status = 'task assigned'";
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $cnt2 =$row3['count'];

    $query4= "SELECT COUNT(lb_id) AS count FROM work WHERE lb_id = $l_id";
    $result4 = mysqli_query($conn, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $cnt3 =$row4['count'];

    $query5 = "SELECT AVG(lb_rating) AS avg
    FROM reviews
    WHERE lb_id = '$l_id'";
    $avg = mysqli_query($conn, $query5);
    $row = mysqli_fetch_assoc($avg);
    $avg =$row['avg'];
    if ($avg ==0){
        $avg = '0';
    }
    if ($cnt1 ==0){
        $cnt1 = '0';
    }
    if ($cnt2 ==0){
        $cnt2 = '0';
    }
    if ($cnt3 ==0){
        $cnt3 = '0';
    }

?>
<div class="row row-cols-4 g-3 my-2">
<a class="text-decoration-none text-dark" href="lb_work.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt2;?></h3>
                <p class="fs-5">Works Pending</p>
            </div>
            <i class="fa-solid fa-truck-fast fa-chart-network fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    </a>
    <a class="text-decoration-none text-dark" href="lb_work.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt1;?></h3>
                <p class="fs-5">Works Done</p>
            </div>
            <i class="fas fa-solid fa-handshake  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</a>
<a class="text-decoration-none text-dark" href="lb_work.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $cnt3;?></h3>
                <p class="fs-5">Total Clients</p>
            </div>
            <i class="fas fa-solid fa-users  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</a>
<a class="text-decoration-none text-dark" href="lb_review.php">
    <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $avg;?> ⭐</h3>
                <p class="fs-5">Ratings</p>
            </div>
            <i class="fa-solid fa-thumbs-up fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
        </div>
    </div>
</a>
</div>
<div class="row">

<div class="col col-lg-12">
    
    <ul class="list-group list-group-flush shadow-sm p-3 mb-5 bg-body-tertiary rounded">
    <h2>Reviews</h2>
<?php
 $sql = "SELECT * FROM reviews WHERE lb_id='$l_id'";
	$res = mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {

            $u_mail = $row['user_email'];
            $rv = $row['lb_remarks'];
            echo "<li class='list-group-item'><b>$u_mail</b> : $rv</li>";
            


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
include '../includes/lb_footer.php';

?>