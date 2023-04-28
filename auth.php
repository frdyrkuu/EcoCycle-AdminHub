<?php
session_start();
require_once('connection.php');
$error = ''; // initialize error message variable

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT * FROM user_admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User found, check if the password is correct
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables

            $_SESSION['admin-name'] = $row['name'];
            
            header('Location: ./dashboard.php');
            exit;
        } else {
            // Password is incorrect, display error message
            $error = "Invalid username or password";
            header("Location: admin-login-form.php?error=Incorrect password");
            exit();
        }
    } else {
        // User not found, display error message
        $error = "Invalid username or password";
        header("Location: admin-login-form.php?error=Incorrect password");
    }
}
