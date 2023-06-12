<?php 
    session_start();
    
// if(isset($_POST['userlogin'])){
// 	$uemail = $_POST['uemail'];
// 	$_SESSION['uemail'] = $uemail;

// }

$uemail = 	$_SESSION['uemail'];


    include './includes/connect.php';
    include './includes/header.php';
    
    $query = "SELECT user_name,user_email,user_img FROM user where user_email='$uemail'";
    $result = mysqli_query($conn, $query);
    

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $u_name = $row['user_name'];
            $u_mail = $row['user_email'];
            $u_img = $row['user_img'];
        }
    }
    else{
        echo 'no records found';
    }

?>
<style>
    body{
    background: #e6e3e3;
    font-family: 'Open sans', Arial, sans-serif;
    padding-top: 70px;

    }
    .ci{
    border-radius: 50%;
    align-self: center;
    width: 150px;
    height: 150px;
    margin-top: 2%;
    object-fit: cover;
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
  display:none;
  z-index: 999;
}
.icc:hover{
    padding: 6px;
    border-radius: 113px;
background: linear-gradient(145deg, #cacaca, #f0f0f0);
box-shadow:  12px 12px 24px #a4a4a4,
            -12px -12px 24px #ffffff;
}
.shadows{
    border-radius: 3px;
background: #f5f5f5;
box-shadow:  9px 9px 18px #e1e1e1,
             -9px -9px 18px #ffffff;
}
.shadows:hover{
    border-radius: 3px;
background: #f5f5f5;
box-shadow:  9px 9px 18px #e1e1e1,
             -9px -9px 18px #ffffff;
}
.card {
  /* width: 190px;
  height: 254px; */
  border-radius: 30px;
  background: #e0e0e0;
  box-shadow: 5px 5px 30px #bebebe,
            -5px -5px 30px #ffffff;
}



</style>
<body>
<div class="new-body">

<?php include 'includes/NavBar.php'; 

$myArray = [1, 2, 3, 4, 5];
$myArray2 = ['Painters','Plumbers', 'Electrician', 'Carpenters', 'Helpers'];
$myArray3 = ['rgba(118, 234, 162, 1)','#80ffbf', '#b3ffff', ' #ffd480', ' #e6ccff'];

    
?>
<div class="container mt-5">
<div class="row d-flex  justify-content-center g-3 row-cols-md-1 row-cols-sm-1">
    <div class="col col-lg-6 ">

        <div class="card text-center shadows shadow  bg-body-tertiary rounded">
                <img src="<?php echo $u_img; ?>" class="card-img ci" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hii <?php echo $u_name; ?></h5>
                    <p class="card-text">Discover free and easy ways to find a great hire, fast. </p>
                    <a href="#labours" class="btn btn-primary">Hire Labour</a>
                    <a href="view_status.php" class="btn btn-primary">View Status</a>
                </div>
                <hr>
                    <div class="card-text mb-2 w-100">
                    Welcome to our Labour Management System!
                    </div>
                </div>
        </div>

        <!-- side slide  -->
        <div class="col col-lg-4 side-c h-100">
        <div class="card h-100 shadows shadow  bg-body-tertiary rounded" style="max-width:100%">
<div class="card-header fs-3 tex-center">Labour Management System</div>
<div class="card-body">
    <h5 class="card-title text-center">Are You Loking for ?</h5>
    <div class="container text-center">
                <div class="row justify-content-around">
                    <div class="col-4">
                    <a href="#Painters" class="text-decoration-none fs-6"><i class="fa-solid fa-paint-roller "></i> Painter</a>
                    </div>
                    <div class="col-4">
                    <a href="#Plumbers" class="text-decoration-none fs-6"><i class="fa-solid fa-screwdriver-wrench"></i> Plumber</a>
                    </div>
                </div>
                <div class="row justify-content-around mt-2">
                    <div class="col-4">
                    <a href="#Electrician" class="text-decoration-none mx-0 fs-6"><i class="fa-solid fa-lightbulb "></i> Electrician</a>
                    </div>
                    <div class="col-4">
                    <a href="#Carpenters" class="text-decoration-none fs-6"><i class="fa-solid fa-gavel"></i> Carpenter</a>
                    </div>
                </div>
                <div class="row justify-content-evenly mt-2">
                    <div class="col-4">
                    <a href="#Helpers" class="text-decoration-none fs-6"><i class="fa-solid fa-helmet-safety"></i> Helper</a>
                    </div>
                </div>
                </div>
</div>
<hr>
<H4 class="p-2">Discover Talent:</H4>
<p class=" text-dark text-start px-3 m-0">
    <b> </b> Explore our vast network of skilled professionals and hire the right candidates for your jobs. </p><p class=" text-dark mt-1 text-start px-3 ">Our robust filters and detailed profiles make it easy to find individuals who possess the `skills` and `experience` you need.
</p>
<!-- inside  -->
    </div>
    </div>
    </div>
</div>
<!-- xtrass  -->
<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="clr row col-lg-10 mt-5 justify-content-around">
        <div class="col text-center">
            <a  href="#Painters">
                <i class="fa-solid icc fa-paint-roller fa-beat"></i>
            </a>
        </div>   
        <div class="col text-center">
        <a  href="#Plumbers">
            <i class="fa-solid icc fa-screwdriver-wrench fa-beat"></i>
            </a>
        </div>
        <div class="col text-center">
        <a href="#Electrician">
            <i class="fa-solid icc fa-lightbulb fa-beat"></i>
            </a>
        </div>
        <div class="col text-center">
        <a href="#Carpenters">
            <i class="fa-solid icc fa-gavel fa-beat"></i>
            </a>
        </div>
        <div class="col text-center">
        <a href="#Helpers">
            <i class="fa-solid icc fa-helmet-safety fa-beat"></i>
            </a>
        </div>
    </div>
</div>
<hr>
<!-- labours  -->
<div id="labours" class="container col-lg-9 mt-5">
<?php
for ($i = 0; $i < count($myArray); $i++) {
    $j=$i+1;
    echo "<h2 id='$myArray2[$i]' style='padding-top: 90px; margin-top: -80px;'>$myArray2[$i]</h2>";
    echo "<div  class='row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 justify-content-start '>";

    $query="SELECT labours.lb_name, labours.lb_email, labours.ctg_id, labours.image_path, AVG(reviews.lb_rating) AS avg_rating,COUNT(reviews.lb_rating) AS cnt FROM labours LEFT JOIN reviews ON labours.id = reviews.lb_id WHERE labours.ctg_id=$myArray[$i] GROUP BY labours.id ORDER BY avg_rating DESC";

    $result = mysqli_query($conn, $query);
        

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $col1 = $row['lb_name'];
                $col2 = $row['lb_email'];
                $col3 = $row['ctg_id'];
                $img_path = $row['image_path'];
                $art = $row['avg_rating'];
                $cnt = $row['cnt'];

                
                echo '<div class="col ">';
                    echo "<div class='card text-center shadow-lg p-3 m-auto mt-1 mb-1 bg-body-tertiary rounded'>";
                    echo'<img src='.$img_path.' class="card-img  ci" alt="...">';
                        echo '<div class="card-body cd1">';
                        echo '<h5 class="card-title">'.$col1.'</h5>';
                        echo '<p class="card-text">'.$col2.'</p>';
                        echo '</div>';
                    
                        echo '<div class="card-footer text-body-secondary">';
                        echo '<form method="POST" action="view_labour.php">';
                        echo '<input type="hidden" name="lb_id" value='.$col2.'>';
                        echo '<button type="submit" class="btn btn-primary position-relative">View<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">'.number_format($art,1).'('.$cnt.')<i class="fa-regular fa-star"></i><span class="visually-hidden">unread messages</span></span></button>';
                        echo '</form>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                
                

            }
        } else {
            echo 'No records found.';
        }
        echo '</div>';
    // echo "<hr id='$myArray2[$j]'>";


}

?>
</div>
<a href="#" class="btn btn-warning btn-floating tex-dark" id="GoToTopBtn">
<i class="fa-solid fa-up"></i>⇱</a>
<!-- </div></div></div> -->

<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
        $('#GoToTopBtn').fadeIn();
        } else {
        $('#GoToTopBtn').fadeOut();
        }
    });

    $('#GoToTopBtn').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        return false;
    });
</script>
</body>
</html>