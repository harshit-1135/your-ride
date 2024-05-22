<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/aae27bcfc8.js" crossorigin="anonymous"></script>
    <title>YourRide</title>
</head>
<body>

    <div id="Container">
        <div id="LeftSide">
            <img  src="Images/classic-car-illustration-holiday-poster_409025-754-removebg-preview 1.png" alt="" id="LeftSideImage">
            <h2 id="LoginText">
            CarPoolin
        </h2>
        <h3 id="Loginsubtext">
            Join today to unlock <br> 100+ travels daily
        </h3>
        </div>
        <div id="rightSide">
            <form action="login-back.php" method="post">
                <input type="text" name="email"placeholder="   Email">
                <input type="password" name="pass"placeholder="   Password">
                <input type="submit" value="Start"  >
            </form>
            <a href="signup.php"><h4>New user? Click to Sign up</h4></a>
        </div>
    </div>

</body>
</html>