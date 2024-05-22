<?php
$ride_id = $_GET["ride_id"];
include("db-conn.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM ride_details WHERE ride_id='$ride_id'";
if(mysqli_query($conn, $sql)){
    $sql2 = "DELETE FROM ride_history WHERE ride_id='$ride_id'";
    if(mysqli_query($conn, $sql2)){
    header("Location: ridesHistory.php?rideDeleted");}
} 

?>