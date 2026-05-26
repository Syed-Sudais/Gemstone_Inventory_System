<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Customer</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

<div class="container mt-5">

  <div class="card shadow p-4">

    <h1 class="mb-4">Add Customer</h1>

    <form action="add_customer.php" method="POST">

      <div class="mb-3">
        <label class="form-label">Customer ID</label>
        <input type="text"
               class="form-control"
               value="Auto Generated"
               disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Customer Name</label>
        <input type="text"
               name="name"
               class="form-control"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               class="form-control"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text"
               name="phone"
               class="form-control"
               required>
      </div>

      <button type="submit" class="btn btn-success">
        Save Customer
      </button>

      <a href="customers.php" class="btn btn-secondary">
        Back
      </a>

    </form>

  </div>

</div>

</body>
</html>