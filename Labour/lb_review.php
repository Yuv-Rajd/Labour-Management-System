<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/lb_navbars.php';
?>
<ul class="list-group list-group-flush shadow-sm p-3 mb-5 bg-body-tertiary rounded">
    <h2>Reviews</h2>
<?php
$id =  $_SESSION['id'];

$query = "SELECT r.*
FROM reviews AS r
JOIN labours AS l ON r.lb_id = l.id
WHERE l.lb_email = '$id'";

        $result = mysqli_query($conn, $query);
        
        // Check if any results were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Retrieve column values
                $col1 = $row['user_email'];
                $col2 = $row['lb_rating'];
                $col3 = $row['lb_remarks'];

                echo "<li class='list-group-item'><b>$col1 [$col2 ⭐] </b>: $col3</li>";
            }
        }
        else{
            echo "<li class='list-group-item'>No records found</li>";
        }

?>
</ul>
</div>


<?php
include '../includes/lb_footer.php';

?>