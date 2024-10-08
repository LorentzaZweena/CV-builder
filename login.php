<?php
session_start();
include 'connection.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);
             header("Location: index2.php");
            $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CV</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .login-container p {
            font-size: 14px;
            color: #6c757d;
        }
        .btn-custom {
            background-color: #1A1C6A;
            color: #ffffff;
            border-radius: 4px;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            margin-top: 1em;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: white;
            border: 1px solid #1A1C6A;
            color: black;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Welcome Back!</h1>
        <p class="text-center" style="margin-top: -1em;">Log in to continue</p>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-custom" name="login">Login</button>
            <p class="text-center mt-3">No account? <a href="register.php">Sign in</a></p>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>