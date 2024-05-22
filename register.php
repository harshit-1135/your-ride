<?php

$name = val($_POST["name"]);  
$email = val($_POST["email"]); 
$pass = val($_POST["pass"]); 
$phone = val($_POST["phone"]); 

$passwordd = password_hash($pass,PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(15));


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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if(empty($name)){
      header("Location: signup.php?error=NameRequired");
    exit();}

if(empty($email)){
header("Location: signup.php?error=MailAddressrequired");
exit();
}

if(empty($pass)){
header("Location: signup.php?error=Passwordrequired");
exit();
}

if(empty($phone)){
    header("Location: signup.php?error=phoneNumberRequired");
    exit();
    }

 $sql = "SELECT * FROM user_details WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email ){
				
				   header("Location: signup.php?error=alreadyexists");
                

                exit();

		}
	
		
		}
else { 
    $sql = "INSERT INTO user_details (name,email,phone,pass,token,status) VALUES ('$name','$email','$phone','$passwordd','$token','inactive')";
    if ($conn->query($sql) === TRUE) {
        $mail = new PHPMailer(true);


        //Server settings
                            
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'harshitbakhshi83@gmail.com';                     
        $mail->Password   = 'beahqxvyacvarnkw';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;     
        
        $mail->setFrom('harshitbakshi83@gmail.com');
    
        $mail->addAddress($email);
    
        $mail->isHTML(true);
    
        $mail->Subject=("Email verification");
    
        $mail->Body = "Hi, $name click here to activate your account http://localhost/Carpooling/verify.php?token=$token";

        $mail->send();
    
        header("Location: login.php?mailsent");}
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    
    }
$conn->close();
?>