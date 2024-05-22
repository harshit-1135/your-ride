<?php 

$token=$_GET["token"];

include("db-conn.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql=("UPDATE user_details  SET status='active' WHERE token='$token'");
$result = mysqli_query($conn, $sql);

header("Location: login.php?verified");


?>