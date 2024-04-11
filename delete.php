<?php
include('connection.php');
error_reporting(0);

$id = $_GET['id'];
$query = "DELETE FROM products WHERE id='$id'";
$data = mysqli_query($connection, $query);

if ($data) {
    echo "<script>alert('Product deleted')</script>";
?>
    <meta http-equiv="refresh" content="0; url=http://localhost/crud/read.php" />
<?php
} else {
    echo 'Failed to delete product';
}
?>