<?php
session_start();
$id=$_SESSION['id'];

$FromPlace = val($_POST["FromPlace"]);  

$DestinationPlace = val($_POST["DestinationPlace"]); 
$DateSelect = val($_POST["DateSelect"]); 
$timeselect = val($_POST["timeselect"]); 
$Price = val($_POST["Price"]); 
$Passengerss = val($_POST["Passengerss"]); 



include('db-conn.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}




    $sql = "INSERT INTO ride_details (pickup,destination,date,time,seats,price,user_id,status) VALUES ('$FromPlace','$DestinationPlace','$DateSelect','$timeselect','$Passengerss','$Price','$id','inactive')";
    if ($conn->query($sql) === TRUE) {
       
    
        header("Location: ridesHistory.php?ridecreated");}
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    
    
$conn->close();
?>