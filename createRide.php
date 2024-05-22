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
if(isset($id)){ ?>
    <div id="Container">
        <div id="LeftSideBooking">
        <h2 id="BookingText">
            Where are <br> you going?
        </h2>
        <div id="leftPartition">
           <div id="WeirdShape">
            <div class="CircleShape">

            </div>
            <div class="rectPart">

            </div>
            <div class="CircleShape">

            </div>
           </div>
            <div id="FromAndToForm">
                <h1 class="FromText">
                    From
                </h1>
                <form action="create-ride.php" method="post">
                    <input type="text" name="FromPlace" id="FromPlace" placeholder="Enter the pickup point">
               <hr>
                    <h1 class="FromText">
                    To
                </h1>
                    <input type="text" name="DestinationPlace" id="DestinationPlace" placeholder="Enter the Destination">
                   <hr>
                    <a href="map.php" target="_blank">Click to know about the distance and time for the travel</a>
<hr>
            </div>
        </div>
       
          
        </div>
       

        <div id="rightSide">
                <h2 class="DateText">
                    Date and Time
                    <img src="Images/pngtree-vector-calendar-icon-png-image_3782243-removebg-preview.png" alt="">
                </h2>
                <label for="Date">Select Date</label>
                <input type="date" name="DateSelect" id="DateSelect">
                <label for="time">Select time</label>
                <input type="time" name="timeselect" id="timeselect">
                <h2 class="DateText">
                    Price
                </h2>
                <input type="text" name="Price" id="Price" placeholder="Enter the fare">
                <label for="Passengers">Seats Available</label>
                <div id="PassengersFlex">
                    <div id="Labels">
                <label for="one">1</label><br>
                <label for="two">2</label><br>
                <label for="three">3</label><br>
                <label for="four">4</label><br>
                    </div>
                    <div id="INPUTS">
                    <input type="radio" id="one" name="Passengerss" value="1">
                <input type="radio" id="two" name="Passengerss" value="2">
                <input type="radio" id="three" name="Passengerss" value="3">
                <input type="radio" id="four" name="Passengerss" value="4">
                    </div>
                </div>
              


                <input type="submit" value="Create">
            </form>
<br>
            <a href="booking.php">Finding rides?</a>
        </div>
    </div>
<?php } else{
          header("Location: login.php?error=loginRequired");

}?>
</body>
</html>