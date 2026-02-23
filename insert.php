<?php
 session_start(); 
require 'connect.php';

$place   = $_POST['placename'];
$guests  = $_POST['guests'];
$arrival = $_POST['arrDate'];
$leaving = $_POST['deptDate'];

$stmt = $conn->prepare("INSERT INTO bookings (where_to, how_many, arrival_date, leaving_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $place, $guests, $arrival, $leaving);

if($stmt->execute()){
    header("Location: ticket.php?id=".$stmt->insert_id);
    exit();
}else{
    echo "Error: ".$stmt->error;
}
?>
