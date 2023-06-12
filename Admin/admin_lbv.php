<?php

include '../includes/connect.php';
include '../includes/header.php';
include '../includes/admin_navbars.php';
?>
<div class="bg-warning">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the table ID from the form submission
    $lb_Id = $_POST['lb_id'];
    
    // Do something with the table ID
    echo '<h1>'. $lb_Id.'</h1>';
}
?>
<a class="ma text-decoration-none btn btn-dark" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">GO BACK</a>
</div>

<?php
include '../includes/admin_footer.php';

?>