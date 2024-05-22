<?php
$ride_id = $_GET["ride_id"];
include("db-conn.php");
session_start();
$id = $_SESSION["id"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM ride_history WHERE ride_id='$ride_id' and user_id='$id'";
if(mysqli_query($conn, $sql)){
   
    header("Location: ridesHistory.php?rideDeleted");}


?>