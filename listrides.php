<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/booking.css">
    <script src="https://kit.fontawesome.com/aae27bcfc8.js" crossorigin="anonymous"></script>
    <title>YourRide</title>
</head>
<body>
<?php
session_start();
$id=$_SESSION['id'];
$FromPlace = val($_POST["FromPlace"]);  

$DestinationPlace = val($_POST["DestinationPlace"]); 
$DateSelect = val($_POST["DateSelect"]); 
include('db-conn.php');
$Passengerss = val($_POST["Passengerss"]); 
$_SESSION['seats']=$Passengerss;
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
$sql = "SELECT * FROM ride_details where date='$DateSelect' and pickup='$FromPlace' and destination='$DestinationPlace' and seats>='$Passengerss'";
$result = $conn->query($sql);
if(isset($id)){ 
?>
    <div id="Container">
       
        <div id="LeftSideRides">
            <a href="booking.php">
        <h2 class="fa-solid fa-arrow-left"></h2></a>
        <h2 id="ridesText">
            Ride from <span><?php echo $FromPlace;?></span> <br> to <span><?php echo $DestinationPlace;?></span>
        </h2>
        <img src="Images/Ellipse 13.png" alt="" id="CarImage">
        <div id="copyright">
            <h4>© YourRide.com, 2023 | Acceptable Use Policy | <br>
 Terms & Conditions | Privacy Policy | <br>
 Email: support@yourride.com
</h4>
        </div>
       
          
        </div>
       

        <div id="rightSide">
            <div class="RideDetails">
            
                <h3 class="Price">
                    Price
                </h3>
                <h3 class="Time">
                    Time
            </h3>
                <h3 class="SeatsAvailable">
                    Seats
                </h3>
            </div>      
            <?php
            if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {    
	?>	         
            <div class="RideDetails">
            
                <h3 class="Price">
                    <?php echo $row['price'];?>
                </h3>
                <h3 class="Time">
                    <?php echo $row['time'];?>
                </h3>
                <h3 class="SeatsAvailable">
                   <?php echo $row['seats'];?>
                </h3>
                <a href="booknow.php?ride_id=<?php echo $row['ride_id'];?>"><button><i class="fa-solid fa-check"></i></button></a>
            </div>   
            <?php	
		} 
	?> 
               


    </div>
    <?php	
	} else {
			echo "0 results";
	}
	
    $conn->close();
    ?>
         
    </div>

</body>
<?php } else{
          header("Location: login.php?error=loginRequired");

}?>
</html>