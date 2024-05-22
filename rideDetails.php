<?php 
session_start();
$id=$_SESSION['id'];
$ride_id = $_GET['ride_id'];
?>
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
if(isset($id)){ 
    include('db-conn.php');
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
        $sql2 = "SELECT * FROM ride_history where ride_id='$ride_id'";
        $result2 = $conn->query($sql2);
    ?>

<div id="Container">
       
       <div id="LeftSideRides">
           <a href="ridesHistory.php">
       <h2 class="fa-solid fa-arrow-left"></h2></a>
      
       <img src="Images/Ellipse 13.png" alt="" id="CarImage">
       <div id="copyright">
           <h4>© YourRide.com, 2023 | Acceptable Use Policy | <br>
Terms & Conditions | Privacy Policy | <br>
Email: support@yourride.com
</h4>
       </div>
      
         
       
       
          
        </div>
       

        <div id="rightSide">
            <h3 class="ridesText">Users on this ride </h3>
            <div class="RideDetails">
            <h3 class="Pickupppp">
                    Name
                </h3>
                <h3 class="Destinationnn">
                    Pickup
                </h3>
                <h3 class="Price">
                    Destination
                </h3>
                <h3 class="Time">
                    Price
            </h3>
               
                <h3 class="Time">
                    Date
            </h3>
          
            </div>   <?php
            if ($result2->num_rows > 0) {
		// output data of each row
		while($row = $result2->fetch_assoc()) {    
            $sql3 = "SELECT * FROM user_details where user_id='$row[user_id]'";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            // output data of each row
            while($row3 = $result3->fetch_assoc()) {    
	?>	      
            <div class="RideDetails">
            <h3 class="riderName">
                    <?php echo $row3['name'];?>
                </h3>
                <h3 class="riderName">
                    <?php echo $row['pickup'];?>
                </h3>
                <h3 class="Price">
                    <?php echo $row['destination'];?>
                </h3>
                <h3 class="Time">
                    <?php echo $row['price'];?>
                </h3>
                <h3>
                     <?php echo $row['date'];?>
                </h3>
               
             
            </div>  
            <?php	
		} }
	?> 
               
               <?php	
	}} else {
			echo "0 results";
	}?>
   <?php
    $conn->close();
    ?>
    </div>
    
            
    </div>
    <?php } else{
          header("Location: login.php?error=loginRequired");

}?>
</body>
</html>