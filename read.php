<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="form.css">
  <title>Products</title>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="./home.php">Product Manager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="./home.php">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./read.php">View all</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <video autoplay muted loop id="background-video">
    <source src="background.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <div class="container">
    <h1 style="color: white; padding:40px 0 0 50px">All Products</h1>
  </div>
  <div class="container my-3 content">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Created At</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('connection.php');

        $query = "SELECT * FROM products";
        $data = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($data)) {
          echo "<tr>
      <th scope='row'>" . $row['id'] . "</th>
      <td>" . $row['name'] . "</td>
      <td>" . $row['description'] . "</td>
      <td>" . $row['price'] . "</td>      
      <td>" . $row['created_at'] . "</td>      
      <td>
        <a href='update.php?id=$row[id]' class='btn btn-success'>Update</a>
        <a href='delete.php?id=$row[id]' class='btn btn-danger' onClick = 'return checkDelete()'>Delete</a></td>      
      </tr>";
        }

        ?>
      </tbody>
    </table>
  </div>
  <script>
    function checkDelete() {
      return confirm('Are you sure you want to delete this product?');
    }
  </script>
</body>