<?php
$mysqli = new mysqli("localhost", "root", "", "project_db", 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {

        $token = bin2hex(random_bytes(50));

        $stmt = $mysqli->prepare("UPDATE users SET reset_token=? WHERE email=?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        $stmt->close();


     $message = "<div style='
     display: flex; 
     justify-content: center; 
     align-items: center; 
     height: 100px; 
     text-align: center;
    color: green;
    font-weight: bold;
    font-size: 1rem; '>
    Reset link: <a href='reset_password.php?token=$token' style='color:#ff4d4d; font-weight:bold; text-decoration:underline;'> Click here to reset password</a>
    </div>";
    } else {
        $message = "Email not found.";
    }
}
?>
<?php if(!empty($message)) { echo "<div style='margin-top:10px;color:green;'>$message</div>"; } ?>