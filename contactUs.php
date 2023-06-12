<?php 

session_start();
$ID =$_SESSION['uemail'];

    include './includes/connect.php';
    include './includes/header.php';

?>
<?php
if(isset($_POST['send'])){

    $email = $_POST['email'];
    $msg = $_POST['msg'];


        
    // if((!empty($id)||!empty($pass)) && $pass==$cpass){
        $sql = "INSERT INTO `chats` (`id`, `user_mail`, `user_msg`) VALUES (NULL, '$email', '$msg')";
        $res = mysqli_query($conn,$sql);
        echo '<div class="container col-lg-12 d-flex justify-content-center">';
        echo '<div class="alert alert-primary  col-lg-8" role="alert">';
        echo 'Message Sent Succesfuly';
        echo '</div>';
        echo '</div>';


}
?>
<style>
@font-face {
    font-family: 'Opensans';
    src: url('./components/Open_Sans/opensans.ttf') format('truetype');
}

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;800&display=swap');

body{
        background: #e6e3e3;
        padding-top: 90px;
        font-family: 'Open sans', Arial, sans-serif;
    }
</style>
<body>

<?php include 'includes/NavBar.php'; ?>
    


<div class="container d-flex flex-column col-lg-8 justify-content-center">


        <div class="row col-lg-12">
            <h2>About Us.</h2>
            <p class="fs-5">we're here to assist you in finding the perfect workforce solution tailored to your needs. Whether you have questions, need assistance, or want to explore partnership opportunities, we're just a message away. Contact us today and let's build a strong foundation.</p>
        </div>
        <hr>
        <div class="row col-lg-8">
            <h2>Messsage Us</h2>

            <form action="contactUs.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value='<?php echo $ID; ?>' required>
                </div>
                <div class="mb-3">
                <label  class="form-label">Message</label>
                <textarea class="form-control"rows="3" name="msg" required></textarea>
            </div>
            <input type="submit" name='send' class="btn btn-success float-end" value="Send">
            </form>
        </div><hr>
        <!-- <div class="row col-lg-12 mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In aliquid voluptatum molestiae, perferendis dolor, ea earum voluptatem voluptate, eos accusamus ipsum! Voluptate a distinctio deserunt voluptatibus deleniti, aut vel quibusdam!
        </div> -->

</div>
</body>
</html>