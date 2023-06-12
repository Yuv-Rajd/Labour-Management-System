<?php 
    include './includes/connect.php';

if(isset($_POST['hire'])){

    $lb_Id = $_POST['lb_id'];
    $uemail = $_POST['uemail'];


    $sql = "INSERT INTO `work` (`id`, `lb_id`, `user_mail`, `status`) VALUES (NULL, '$lb_Id', '$uemail', 'task assigned')";

    $res = mysqli_query($conn,$sql);

    echo"
        <script>
        alert('Hired');
        document.location.href = 'home.php';
        </script>
    ";

}