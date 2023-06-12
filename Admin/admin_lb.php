<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>

<table class="table">
                <thead>
                    <tr>
                        <th scope="col">'#'</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Labour</th>
                        <th scope="col">Email</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
<?php


$id =  $_SESSION['id'];

$query = "SELECT  labours.lb_name,labours.lb_email,labours.image_path, category.cat_name FROM labours , category WHERE labours.ctg_id = category.id  ORDER BY category.cat_name";
// $query= "SELECT * FROM  WHERE lb_id = $id ORDER BY work.status";

        $result = mysqli_query($conn, $query);

        $index=1;
        // Check if any results were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Retrieve column values
                $col= $row['lb_name'];
                $coll= $row['lb_email'];
                $col1 = $row['cat_name'];
                $image = $row['image_path'];
                
                echo "<tr>";
                echo "<th scope='row'>$index</th>";
                echo "<td><img src='.$image' alt='$col' width='50' height='50'></td>";
                echo "<td>$col</td>";
                echo "<td>$coll</td>";
                echo "<td>$col1</td>";
                echo '</tr>';
                $index +=1;
            }
        }
        else{
            echo 'no records found';
        }
?>
<?php
include '../includes/admin_footer.php';

?>