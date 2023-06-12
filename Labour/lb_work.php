<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/lb_navbars.php';
?>


<table class="table">
                <thead>
                    <tr>
                    <th scope="col">'#'</th>
                    <th scope="col">Hired BY</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update Status</th>
                    </tr>
                </thead>
                <tbody>
<?php


$id =  $_SESSION['lbrid'];
$query= "SELECT * FROM work WHERE lb_id = $id ORDER BY work.status";

        $result = mysqli_query($conn, $query);

        $index=1;
        // Check if any results were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Retrieve column values
                $col= $row['lb_id'];
                $coll= $row['id'];
                $col1 = $row['user_mail'];
                $col2 = $row['status'];
                
                echo "<tr>";
                echo "<th scope='row'>$index</th>";
                echo "<td>$col1</td>";
                echo "<td>$col2</td>";
                if($col2 =='task assigned'){
                    echo "<td>
                    <form action='lb_updateWork.php' method='POST'>
                    <input type='hidden' name='lb_id' value='$col'>
                        <input type='hidden' name='w_id' value='$coll'>
                        <input type='submit' name='accept' value='Accept' class='btn btn-info'>
                        <input type='submit' name='decline' value='Decline' class='btn btn-danger'>
                    </form>
                    </td>";
                }
                else{
                    if($col2 =='task accepted'){
                    echo "<td><form action='lb_updateWork.php' method='POST'>
                    <input type='hidden' name='w_id' value='$coll'>
                    <input type='hidden' name='lb_id' value='$col'>

                        <input type='submit' name='complete' value='Completed' class='btn btn-success'>
                    </form>
                    </td>";
                    }
                    else{
                    echo "<td></td>";
                    }
                }
                echo '</tr>';
                $index +=1;
            }
        }
        else{
            echo 'no records found';
        }

?>


<?php
include '../includes/lb_footer.php';

?>