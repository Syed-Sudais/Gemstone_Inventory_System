<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Supplier</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

<div class="container mt-5">

  <div class="card shadow p-4">

    <h1 class="mb-4">Add Supplier</h1>

    <form action="add_supplier.php" method="POST">

      <div class="mb-3">
        <label class="form-label">Supplier ID</label>
        <input type="text"
               class="form-control"
               value="Auto Generated"
               disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Supplier Name</label>
        <input type="text"
               name="supplier_name"
               class="form-control"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Contact Person</label>
        <input type="text"
               name="contact_person"
               class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text"
               name="phone"
               class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text"
               name="city"
               class="form-control">
      </div>

      <button type="submit" class="btn btn-success">
        Save Supplier
      </button>

      <a href="suppliers.php" class="btn btn-secondary">
        Back
      </a>

    </form>

  </div>

</div>

</body>
</html>