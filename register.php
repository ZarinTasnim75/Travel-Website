
<?php

// $mysqli = new mysqli("localhost", "root", "57200", "travel_db");
$mysqli = new mysqli("localhost", "root", "", "travel_booking", 3306);

if ($mysqli->connect_error) {
    die("Database Connection Failed: " . $mysqli->connect_error);
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$raw_password = $_POST['password'];

/* Email Validation */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid Email Format'); window.history.back();</script>";
    exit;
}

/* Password Validation */
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/', $raw_password)) {
    echo "<script>alert('Password must contain uppercase, lowercase, number & special character (min 8 chars).'); window.history.back();</script>";
    exit;
}

/* Check if email already exists */
$stmt = $mysqli->prepare("SELECT id FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>alert('Email Already Registered!'); window.history.back();</script>";
    exit;
}

$stmt->close();

/* Hash Password */
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

/* Insert User */
$stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
        alert('Registration Successful!');
        window.location.href='index.php';
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();

?>