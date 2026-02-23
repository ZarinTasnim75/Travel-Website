<?php
require 'connect.php';
session_start();

// Get booking id from URL
$id = $_GET['id'] ?? 0;

// Validate ID
if (!$id || !is_numeric($id)) {
    die("Invalid booking ID.");
}

// Fetch booking data
$stmt = $conn->prepare("SELECT * FROM bookings WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

// If no booking found
if (!$data) {
    die("Invalid or missing ticket.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Ticket</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(to right,#4facfe,#00f2fe);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}

.ticket{
    background:#fff;
    width:420px;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    text-align:center;
}

h1{
    margin:10px 0;
    color:#333;
}

.line{
    height:2px;
    background:#eee;
    margin:15px 0;
}

.row{
    display:flex;
    justify-content:space-between;
    margin:10px 0;
    font-size:17px;
}

.label{
    font-weight:bold;
    color:#555;
}

.value{
    color:#000;
}

.status{
    margin-top:15px;
    font-weight:bold;
    color:green;
}

.btn{
    margin-top:15px;
    padding:12px 25px;
    border:none;
    background:#4facfe;
    color:white;
    border-radius:30px;
    font-size:16px;
    cursor:pointer;
    transition: 0.3s;
}

.btn:hover{
    background:#00c6ff;
}

.footer{
    margin-top:15px;
    font-size:13px;
    color:#777;
}
</style>
</head>

<body>

<div class="ticket">

<h1>Booking Confirmed 🎉</h1>

<div class="line"></div>

<div class="row">
<span class="label">Booking ID:</span>
<span class="value"><?= htmlspecialchars($data['id']) ?></span>
</div>

<div class="row">
<span class="label">Destination:</span>
<span class="value"><?= htmlspecialchars($data['where_to']) ?></span>
</div>

<div class="row">
<span class="label">Guests:</span>
<span class="value"><?= htmlspecialchars($data['how_many']) ?></span>
</div>

<div class="row">
<span class="label">Arrival:</span>
<span class="value"><?= htmlspecialchars($data['arrival_date']) ?></span>
</div>

<div class="row">
<span class="label">Departure:</span>
<span class="value"><?= htmlspecialchars($data['leaving_date']) ?></span>
</div>

<div class="row">
<span class="label">Booked On:</span>
<span class="value"><?= htmlspecialchars($data['created_at']) ?></span>
</div>

<div class="line"></div>

<div class="status">Status: Confirmed ✅</div>

<!-- Print Button -->
<button class="btn" onclick="window.print()">Print Ticket</button>

<!-- Book Another Trip Button (Fresh Load) -->
<button class="btn" onclick="window.location.href='index.php'">
    Book Another Trip
</button>

<div class="footer">
Thank you for booking with us ✈
</div>

</div>

</body>
</html>