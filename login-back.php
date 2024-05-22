<?php
session_start();

$email = trim($_POST["email"]);
$pass = trim($_POST["pass"]);
$passwordd = password_hash($pass, PASSWORD_BCRYPT);

include("db-conn.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (empty($email)) {
    header("Location: login.php?error=MailAddressrequired");
    exit();
}
if (empty($pass)) {
    header("Location: login.php?error=Passwordisrequired");		
    exit();
}

$sql = "SELECT * FROM user_details WHERE email='$email' AND status='active'";
$result = mysqli_query($conn, $sql);
$email_count = mysqli_num_rows($result);


if ($email_count) {
    $email_pass = mysqli_fetch_assoc($result);
    $db_pass = $email_pass['pass'];

    if (password_verify($pass, $db_pass)) {
        $_SESSION['id'] = $email_pass['user_id'];
        $_SESSION['name'] = $email_pass['name'];
        header("Location: ridesHistory.php");	
        exit();
    } else {
        header("Location: login.php?error=IncorectMailAddressorpassword");			
        exit();
    }
} 

else{
    header("Location: login.php?error=IncorectMailAddressorpassword");			
    exit();
}
?>
