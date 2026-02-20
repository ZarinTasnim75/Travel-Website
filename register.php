<?php
$mysqli = new mysqli("localhost", "root", "", "project_db", 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get raw form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$raw_password = $_POST['password'];

// -------------------
// Email validation
// -------------------
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format'); window.history.back();</script>";
    exit;
}

// -------------------
// Password validation
// -------------------
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/', $raw_password)) {
    echo "<script>alert('Password must be at least 8 characters and include uppercase, lowercase, number and special character.'); window.history.back();</script>";
    exit;
}

// -------------------
// Check if email exists
// -------------------
$stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>alert('Email already registered!'); window.history.back();</script>";
    $stmt->close();
    $mysqli->close();
    exit;
}
$stmt->close();

// -------------------
// Hash password AFTER validation
// -------------------
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

// -------------------
// Insert user
// -------------------
$stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
            alert('Registration successful!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>