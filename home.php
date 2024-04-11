<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <style>
        .width {
            width: 50%;
        }

        @media only screen and (min-width: 200px) and (max-width: 576px) {
            .width {
                width: 80%;
            }
        }
    </style>
    <title>Product Manager</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php">Product Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home.php">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./read.php">View all</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <video autoplay muted loop id="background-video">
        <source src="background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container width my-3 content d-flex flex-column justify-content-center">
        <h1 class="py-1">Add Product</h1>
        <form action='#' method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="Name" placeholder="Product Name" name="name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="Description" placeholder="Description" name="description" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="Price" placeholder="Price" name="price" pattern='\d+(\.\d{1,2})?' title="Enter numbers only" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Procuct</button>
        </form>
    </div>
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $query = "INSERT INTO PRODUCTS (name, description, price) VALUES ('$name', '$description', '$price')";

            $data = mysqli_query($connection, $query);


            if ($data) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Product has been added successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            } else {
                echo "Failed to insert data";
            }

            // INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`) VALUES ('1', 'laptop', 'a new age device', '66000.28', current_timestamp());
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>