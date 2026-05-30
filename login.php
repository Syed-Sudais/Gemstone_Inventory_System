<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width:400px;">

        <h2 class="text-center mb-4">Admin Login</h2>

        <form action="login_process.php" method="POST">

            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" class="btn btn-primary w-100">Login</button>

        </form>

    </div>
</div>

</body>
</html>