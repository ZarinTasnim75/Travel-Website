
<?php

$conn = mysqli_connect("localhost", "root", "57200", "travel_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (name, email, number, subject, message)
        VALUES ('$name', '$email', '$number', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Message Sent Successfully!');
        window.location.href='index.php';
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>