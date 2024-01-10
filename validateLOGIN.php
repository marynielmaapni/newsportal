<?php
session_start();

require 'dbconnect.php';

if (!isset($_POST['user_email']) || !isset($_POST['user_pass'])) {
    // If either email or password is not set, redirect with error
    $_SESSION['isValidEmail'] = false;
    $_SESSION['isValidPass'] = false;
    header('Location: index.php');
    exit();
}

$user_email = strtolower($_POST['user_email']);
$user_pass = $_POST['user_pass'];

// Use prepared statement to prevent SQL injection
$query = "SELECT * FROM login_userinfo WHERE email=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $user_email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['user_password'];

        // Verify password using password_verify function
        if (password_verify($user_pass, $stored_password)) {
            // Password is valid, do something here (e.g., set session variables)
            $_SESSION['isLoggedIn'] = true;
            header('Location: index.php');
            exit();
        } else {
            // Invalid password, redirect with error
            $_SESSION['isValidEmail'] = true;
            $_SESSION['isValidPass'] = false;
            header('Location: index.php');
            exit();
        }
    } else {
        // User not found, redirect with error
        $_SESSION['isValidEmail'] = false;
        $_SESSION['isValidPass'] = false;
        header('Location: index.php');
        exit();
    }
} else {
    // Handle database connection error
    $_SESSION['isValidEmail'] = false;
    $_SESSION['isValidPass'] = false;
    header('Location: index.php');
    exit();
}
?>
