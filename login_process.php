<?php
session_start();

include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users
          WHERE username='$username'
          AND password='$password'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    $_SESSION['username'] = $username;

    header("Location: dashboard.php");
    exit();

} else {

    echo "
    <script>
        alert('Invalid Username or Password');
        window.location.href='login.php';
    </script>
    ";
}
?>