<?php 

session_start();
$ummail = $_SESSION['uemail'];

    include './includes/connect.php';
    include './includes/header.php';
?>
<style>
    body{
        background: #e6e3e3;
    font-family: 'Open sans', Arial, sans-serif;
        padding-top:100px;
    }
    .new-body{
  position: relative;
  min-height: 100vh;
  padding-bottom: 50px;
}

#GoToTopBtn{
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
}
</style>

<body>
    <?php include 'includes/NavBar.php'; ?>



<div class="container new-body">
<div class="row col-lg-12 row-cols-sm-1 row-cols-md-1 ">
    <div class="col col-lg-8">
        <div class="row">
    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $lb_Id = $_POST['lb_id'];
    $query = "SELECT * FROM labours where labours.lb_email='$lb_Id'";
        $result = mysqli_query($conn, $query);
        

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $col1 = $row['lb_name'];
                $col2 = $row['lb_email'];
                $col3 = $row['ctg_id'];
                $lb_id = $row['id'];
                $lb_about = $row['lb_about'];
                $img_path = $row['image_path'];

            ?>
            <!-- card-start  -->
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-5 d-flex justify-content-center p-2" >
      <img src="<?php echo $img_path; ?>" class="img-fluid rounded-start ci mt-2" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title"><?php echo $col1;?></h5>

        <p class="card-text"><?php echo $lb_about; ?></p>
        
        <p>Labour will contact You Directly!</p> 
            <form class="mt-5 me-0" action="hire.php" method="POST">
                        <input type="hidden" value="<?php echo $lb_id; ?>" name='lb_id'>
                        <input type="hidden" value=<?php echo $ummail ; ?> name="uemail">
                        <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-success me-0" name="hire" value="Hire">
                </div>
            </form>

            
    </div>
    </div>
</div>
</div>
</div>
<!-- card-end  -->
            <?php

                $query = "SELECT AVG(lb_rating) AS avg
                FROM reviews
                WHERE lb_id = '$lb_id'";
                $avg = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($avg);
                $avg =$row['avg'];
                $avg = number_format($avg,1);
                if ($avg ==0){
                    $avg = 'No Ratings yet';
                }
                
                
                    ?>
                    <div class="row">

                        <div class="col card text-center shadow bg-body-tertiary rounded">
                            <h5 class="card-header">Ratings : <?php echo $avg ; ?></h5>
                            <div class="card-body d-flex flex-column justify-content-around">
                                <!-- <h5 class="card-title">Give Your Rating</h5> -->
                                <p class="card-text">Give Your Ratings</p>
                                <div class="col-lg-12 d-flex justify-content-center">
                                <form action="submit_review.php " class="col-lg-4 " method="POST">
                                    <select name="rating" class="form-select form-select-sm" id="rating">
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                    <br>
                                    <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                    <input type="email" value='<?php echo $ummail ; ?>' name="user_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                    <input type="hidden" value="<?php echo $lb_id; ?>" name='lb_id'>
                                    <div class="input-group">
                                    <span class="input-group-text">Review</span>
                                    <textarea class="form-control" name="review" aria-label="With textarea"></textarea>
                                    </div>
                                    <input class="btn btn-primary mt-1"name="rv" type="submit" value="Submit Rating">
                                </form>
                                </div>
                            </div>
                            </div>
                    </div>
            
            <?php
            }
        }
}
?>

</div>
<div class="col col-lg-4">
    
    <ul class="list-group list-group-flush shadow p-3 mb-5 bg-body-tertiary rounded">
    <h2>Reviews</h2>
<?php
 $sql = "SELECT * FROM reviews WHERE lb_id='$lb_id'";
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
</div>
<a href="home.php" class="btn btn-warning btn-floating tex-dark" id="GoToTopBtn">
<i class="fa-solid fa-up"></i><< Home</a>
</div>

<!-- </div> -->
</body>
</html>