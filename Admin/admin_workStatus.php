<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>

<table class="table">
                <thead>
                    <tr>
                    <th scope="col">'#'</th>
                    <th scope="col">Labours</th>
                    <th scope="col">Hired By</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
<?php
$query = "SELECT work.user_mail, labours.Lb_name, category.cat_name, work.status FROM work JOIN labours ON work.lb_id = labours.id JOIN category ON labours.ctg_id = category.id  ORDER BY work.status";

$result = mysqli_query($conn, $query);
$index=1;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $user_mail = $row['user_mail'];
                $lb_name = $row['Lb_name'];
                $ct_name = $row['cat_name'];
                $wst = $row['status'];
            

                echo "<tr>";
                echo "<th scope='row'>$index</th>";
                echo "<td>$lb_name</td>";
                echo "<td>$ct_name</td>";
                echo "<td>$user_mail</td>";
                echo "<td>$wst</td>";
                echo '</tr>';
                $index +=1;
            }
        }
?>
    </tbody>
</table>



<?php
include '../includes/admin_footer.php';

?>