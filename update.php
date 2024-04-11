<?php include('connection.php');
error_reporting(0);
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id='$id'";
$data = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($data)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="form.css">
  <title>Update product details</title>
</head>

<body>
    <video autoplay muted loop id="background-video">
        <source src="background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container w-50 my-3 content">
        <h1 class="py-1 text-center">Update Product details</h1>
        <form action='#' method="POST">
            <div class="mb-3">
                <label for="Name">Name</label>
                <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="Name" placeholder="Product Name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="Description">Description</label>
                <input type="text" value="<?php echo $row['description']; ?>" class="form-control" id="Description" placeholder="Description" name="description" required>
            </div>
            <div class="mb-3">
                <label for="Price">Price</label>
                <input type="text" value="<?php echo $row['price']; ?>" class="form-control" id="Price" placeholder="Price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update Procuct</button>
        </form>
    </div>
    <div class="container">
        <?php
  if(isset($_POST['update'])){
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      
      $query = "UPDATE PRODUCTS SET name='$name', description='$description', price='$price' WHERE id='$id'";
      
      $data = mysqli_query($connection,$query);

      
      if($data){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Product has been updated successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          echo "<script>alert('Record updated')</script>";
          ?>
          <meta http-equiv="refresh" content="2; url=http://localhost/crud/display.php" />
          <?php
        } else {
            echo "Failed to update data";
        }
        
        // INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`) VALUES ('1', 'laptop', 'a new age device', '66000.28', current_timestamp());
    }
    ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

