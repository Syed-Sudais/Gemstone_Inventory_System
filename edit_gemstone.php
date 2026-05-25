<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM gemstones WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Gemstone</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">

    <h2 class="mb-4">Edit Gemstone</h2>

    <form action="update_gemstone.php" method="POST">

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <input type="text" name="name" class="form-control mb-3" value="<?php echo $row['name']; ?>" required>

      <input type="text" name="color" class="form-control mb-3" value="<?php echo $row['color']; ?>" required>

      <input type="text" name="weight" class="form-control mb-3" value="<?php echo $row['weight']; ?>" required>

      <input type="number" name="price" class="form-control mb-3" value="<?php echo $row['price']; ?>" required>

      <button type="submit" class="btn btn-primary">Update Gemstone</button>

      <a href="gemstones.php" class="btn btn-secondary">Back</a>

    </form>

  </div>
</div>

</body>
</html>