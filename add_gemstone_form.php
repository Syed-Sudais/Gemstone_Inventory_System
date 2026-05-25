<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Gemstone</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">

    <h2 class="mb-4">Add Gemstone</h2>

    <form action="add_gemstone.php" method="POST">

      <input type="text" name="name" class="form-control mb-3" placeholder="Gemstone Name" required>

      <input type="text" name="color" class="form-control mb-3" placeholder="Color" required>

      <input type="text" name="weight" class="form-control mb-3" placeholder="Weight" required>

      <input type="number" name="price" class="form-control mb-3" placeholder="Price" required>

      <button type="submit" class="btn btn-success">Save Gemstone</button>

      <a href="gemstones.php" class="btn btn-secondary">Back</a>

    </form>

  </div>
</div>

</body>
</html>