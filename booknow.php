<?php
include("db-conn.php");
session_start();
$id= $_SESSION['id'];
$ride_id=$_GET['ride_id'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $sql = "SELECT * FROM ride_details where ride_id='$ride_id'";
    

    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $seatsNew = $row['seats']-$_SESSION['seats'];
            $sql2 = "INSERT INTO ride_history (pickup,destination,date,price,status,ride_id,user_id) VALUES ('$row[pickup]','$row[destination]','$row[date]','$row[price]','$row[status]','$ride_id','$id')";
            if ($conn->query($sql2) === TRUE) {
                $sql3=("UPDATE ride_details  SET seats='$seatsNew' WHERE ride_id='$ride_id'");
        $result2 = mysqli_query($conn, $sql3);
        header("Location: ridesHistory.php?Booked");

        }}}    


?>