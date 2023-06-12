<?php
include '../includes/connect.php';
session_start();

$id =  $_SESSION['lbrid'];

if(isset($_POST['accept'])){

    $lb_id = $_POST['lb_id'];
    $w_id = $_POST['w_id'];
    
    echo $lb_id;
    echo $w_id;
    echo 'accept';
        $sql = "UPDATE `work` SET `status` = 'task accepted' WHERE `work`.`id` = '$w_id' AND `work`.`lb_id`='$lb_id'";
        $res = mysqli_query($conn,$sql);
        header("location:lb_work.php");

    }
    

    if(isset($_POST['decline'])){
        $lb_id = $_POST['lb_id'];
        $w_id = $_POST['w_id'];
        
        echo $lb_id;
        echo $w_id;
        echo 'decline';
            $sql = "UPDATE `work` SET `status` = 'task declined' WHERE `work`.`id` = '$w_id' AND `work`.`lb_id`='$lb_id'";
            $res = mysqli_query($conn,$sql);
            header("location:lb_work.php");

        }
    
        if(isset($_POST['complete'])){

            $lb_id = $_POST['lb_id'];
        $w_id = $_POST['w_id'];
        
        echo $lb_id;
        echo $w_id;
        echo 'completed';
            $sql = "UPDATE `work` SET `status` = 'task done' WHERE `work`.`id` = '$w_id' AND `work`.`lb_id`='$lb_id'";
            $res = mysqli_query($conn,$sql);
            header("location:lb_work.php");
            }
            

?>