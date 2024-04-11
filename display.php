
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <div class="container">
        <h1>Products</h1>
    </div>
    <div class="container my-3">
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
    $data = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($data)){
      echo "<tr>
      <th scope='row'>". $row['id']."</th>
      <td>". $row['name']."</td>
      <td>". $row['description']."</td>
      <td>". $row['price']."</td>      
      <td>". $row['created_at']."</td>      
      <td>
        <a href='update.php?id=$row[id]' class='btn btn-success'>Update</a>
        <a href='delete.php' class='btn btn-danger'>Delete</a></td>      
      </tr>";
    }

?>
  </tbody>
</table>
    </div>
</body>
</html>