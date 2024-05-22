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
$id = $_SESSION['id'];
if(isset($id)){ 
    include('db-conn.php');
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        $sql = "SELECT * FROM ride_details where user_id='$id'";
        $result = $conn->query($sql);
        $sql2 = "SELECT * FROM ride_history where user_id='$id'";
        $result2 = $conn->query($sql2);
    ?>

    <div id="Container">
        <div id="LeftSideRides">
        <h2 class="ridesText">
            Your <span>Rides</span> 
            
            <a href="Login_v1/index.php"><i class="fa-solid fa-user" style="float: right; padding-right:4em;"></i></a>
        </h2>
        <a href="booking.php"><h3>Book Another Ride?</h3></a>
        <img src="Images/Ellipse 13.png" alt="" id="CarImage">
        <div id="copyright">
            <h4>© YourRide.com, 2023 | Acceptable Use Policy | <br>
 Terms & Conditions | Privacy Policy | <br>
 Email: support@yourride.com
</h4>
        </div>
       
          
        </div>
       

        <div id="rightSide">
            <h3 class="ridesText">Rides by <span>you</span></h3>
            <div class="RideDetails">
            <h3 class="Pickupppp">
                    Pickup
                </h3>
                <h3 class="Destinationnn">
                    Destination
                </h3>
                <h3 class="Price onlyOnLaptop">
                    Price
                </h3>
                <h3 class="Time onlyOnLaptop">
                    Date
            </h3>
               
                <h3 class="Time onlyOnLaptop">
                    Time
            </h3>
               
            </div>   <?php
            if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {    
	?>	      
            <div class="RideDetails">
                <a href="rideDetails.php?ride_id=<?php echo $row['ride_id'];?> ">
                <h3 class="riderName">
                    <?php echo $row['pickup'];?>
                </h3></a>
                <h3 class="Price">
                    <?php echo $row['destination'];?>
                </h3>
                <h3 class="Time onlyOnLaptop" >
                    <?php echo $row['price'];?>
                </h3>
                <h3 class="Time onlyOnLaptop">
                     <?php echo $row['date'];?>
                </h3>
                <h3 class="Time onlyOnLaptop">
                     <?php echo $row['time'];?>
                </h3>
                <?php if($row['status']=='inactive'){?>
                <a href="cancelride.php?ride_id=<?php echo $row['ride_id'];?> "><button ><i class="fa-solid fa-xmark"></i> </button></a> <?php } ?>
                <?php if($row['status']=='inactive'){?>
                <a href="startride.php?ride_id=<?php echo $row['ride_id'];?>"><button>Start </button></a> <?php } ?>
                <?php if($row['status']=='started'){?>
                <a href="finishride.php?ride_id=<?php echo $row['ride_id'];?>"><button>Finish </button></a> <?php } ?>
                <?php if($row['status']=='finished'){?>
                <h3 class="ridesText">Ride Finished</h3> <?php } ?>
            </div>  
            <?php	
		} 
	?> 
               
               <?php	
	} else {
			echo "0 results";
	}?>
    <h3 class="ridesText">Rides <span>History</span></h3>
	     <div class="RideDetails">
            <h3 class="Pickupppp">
                    Pickup
                </h3>
                <h3 class="Destinationnn">
                    Destination
                </h3>
                <h3 class="Price">
                    Price
                </h3>
                <h3 class="Time onlyOnLaptop">
                    Date
            </h3>
               
               
               
            </div>   <?php
            if ($result2->num_rows > 0) {
		// output data of each row
		while($row2 = $result2->fetch_assoc()) {    
	?>	      
            <div class="RideDetails" style="margin-bottom: 6em">
                <h3 class="riderName">
                    <?php echo $row2['pickup'];?>
                </h3>
                <h3 class="Price">
                    <?php echo $row2['destination'];?>
                </h3>
                <h3 class="Time">
                    <?php echo $row2['price'];?>
                </h3>
                <h3 class="onlyOnLaptop">
                     <?php echo $row2['date'];?>
                </h3>
              <?php if($row2['status']=='inactive'){?>
                <a href="cancelride2.php?ride_id=<?php echo $row2['ride_id'];?> "> <button><i class="fa-solid fa-xmark"></i> </button></a> <?php }?>
                <?php if($row2['status']=='started'){?>
                    <h3 class="ridesText">Ride Started</h3> <?php } ?>
                <?php if($row2['status']=='finished'){?>
                <h3 class="ridesText">Ride Finished</h3> <?php } ?>
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
    
            
    </div>
    <?php } else{
          header("Location: login.php?error=loginRequired");

}?>
</body>
</html>