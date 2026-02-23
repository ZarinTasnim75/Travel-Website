<?php

$mysqli = new mysqli("localhost", "root", "", "travel_booking", 3306);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (name, email, number, subject, message)
        VALUES ('$name', '$email', '$number', '$subject', '$message')";

if ($mysqli->query($sql)) {
    echo "<script>
        alert('Message Sent Successfully!');
        window.location.href='index.php';
    </script>";
} else {
    echo "Error: " . $mysqli->error;
}

?>