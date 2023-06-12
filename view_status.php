<?php 

session_start();
$ID =$_SESSION['uemail'];

    include './includes/connect.php';
    include './includes/header.php';

?>
<style>
@font-face {
    font-family: 'Opensans';
    src: url('./components/Open_Sans/opensans.ttf') format('truetype');
  /* Add additional src declarations for different font file formats if available */
}

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;800&display=swap');
    body{
        background: #e6e3e3;
        padding-top: 100px;
    font-family: 'Open sans', Arial, sans-serif;

    }
</style>
<body>

<?php include 'includes/NavBar.php'; ?>

<div class="container">
    <a class="text-decoration-none text-dark btn btn-info" href="home.php"><< Home Page</a>
    <div class="row">

<table class="table">
                <thead>
                    <tr>
                    <th scope="col">'#'</th>
                    <th scope="col">Labours</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
<?php
$query = "SELECT work.id, labours.Lb_name, category.cat_name, work.status FROM work JOIN labours ON work.lb_id = labours.id JOIN category ON labours.ctg_id = category.id WHERE work.user_mail='$ID' ORDER BY work.status";

$result = mysqli_query($conn, $query);
$index=1;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $wid = $row['id'];
                $lb_name = $row['Lb_name'];
                $ct_name = $row['cat_name'];
                $wst = $row['status'];
               

                echo "<tr>";
                echo "<th scope='row'>$index</th>";
                echo "<td>$lb_name</td>";
                echo "<td>$ct_name</td>";
                echo "<td>$wst</td>";
                echo '</tr>';
                $index +=1;
            }
        }
?>
    </tbody>
</table>

</div>
</div>
</body>
</html>