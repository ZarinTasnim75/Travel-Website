<?php
session_start(); // start session

$mysqli = new mysqli("localhost", "root", "", "project_db", 3307);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from DB
$stmt = $mysqli->prepare("SELECT id, name, email, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Optional: if password is hashed, use password_verify()
    if (password_verify($password, $user['password'])) { // plain text for now
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = isset($user['name']) ? $user['name'] : $user['email'];

        // Redirect to home page after login
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Invalid password'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Email not found'); window.history.back();</script>";
}

$stmt->close();
$mysqli->close();
?>