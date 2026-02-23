
<?php
session_start();

// $mysqli = new mysqli("localhost", "root", "57200", "travel_db");

$mysqli = new mysqli("localhost", "root", "", "travel_booking", 3306);

if ($mysqli->connect_error) {
    die("Database Connection Failed: " . $mysqli->connect_error);
}

$email = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $mysqli->prepare("SELECT id, name, email, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: index.php");
        exit;

    } else {
        echo "<script>alert('Invalid Password'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Email Not Found'); window.history.back();</script>";
}

$stmt->close();
$mysqli->close();
?>