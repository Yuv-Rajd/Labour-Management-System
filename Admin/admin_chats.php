<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>

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