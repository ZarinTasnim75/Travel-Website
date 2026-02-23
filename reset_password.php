<?php
$mysqli = new mysqli("localhost", "root", "", "travel_booking", 3306);

$message = "";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password_raw = $_POST['password'];

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/', $new_password_raw)) {
            $message = "Weak password. Must contain uppercase, lowercase, number & special char.";
        } else {
            $hashed_password = password_hash($new_password_raw, PASSWORD_DEFAULT);

            $stmt = $mysqli->prepare("UPDATE users SET password=?, reset_token=NULL WHERE reset_token=?");
            $stmt->bind_param("ss", $hashed_password, $token);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Password updated successfully!'); window.location.href='index.php';</script>";
                exit;
            } else {
                $message = "Invalid or expired token.";
            }
            $stmt->close();
        }
    }
} else {
    $message = "No token provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
.login-form-container {
    position: fixed;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.login-form-container form {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    text-align: center;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    position: relative;
}

.login-form-container i#form-close {
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
    font-size: 1.2rem;
    color: #333;
}

.login-form-container h3 {
    margin-bottom: 20px;
    font-size: 1.5rem;
    color: #333;
}

.login-form-container .box {
    width: 90%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    outline: none;
}

.login-form-container .btn {
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s;
}

.login-form-container .btn:hover {
    background: #0056b3;
}

.login-form-container p {
    margin-top: 15px;
    font-size: 0.9rem;
    color: #666;
}

.login-form-container p a {
    color: #007bff;
    text-decoration: underline;
}

.login-form-container .form-message {
    color: red;       
    font-size: 0.9rem;
    margin: 10px 0;
    text-align: center;
}
</style>
</head>
<body>

<div class="login-form-container">
    <i class="fas fa-times" id="form-close" onclick="window.location.href='index.php';"></i>

    <form id="reset-password-form" method="POST">
        <h3>Reset Password</h3>

        <input type="password" name="password" class="box" placeholder="Enter new password" required>

        <?php if(!empty($message)): ?>
            <p class="form-message"><?php echo $message; ?></p>
        <?php endif; ?>

        <input type="submit" value="Reset Password" class="btn" />

        <p>
            Remember your password? <a href="index.php">Login now</a>
        </p>
    </form>
 </div>
</body>
</html>