<?php
session_start();
$id=$_SESSION['id'];
include("../db-conn.php");

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   
    $sql = "UPDATE user_details  SET name='$name',email='$email',phone='$phone' WHERE user_id='$id'";
    if ($conn->query($sql) === TRUE) {   
        header("Location: index.php");}

?>