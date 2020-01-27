<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();


// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

$applicantID = $_GET['id'];
$email = $_GET['email'];
$date = date('Y-m-d');
$update = $con->query("UPDATE applicant_tbl SET applicationStatus = '2' , dateApprove = '$date' WHERE applicantID = '$applicantID' ");

if ($update) {

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'atocayon27@gmail.com';                     // SMTP username
      $mail->Password   = 'whowndqifqhsudwb';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('atocayon27@gmail.com', 'Leyte Normal University');
      $mail->addAddress('atocayon27@gmail.com', 'Joe User');     // Add a recipient             // Name is optional

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Congratulation! Your Application  has been approved';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
      header("Location: index.php");
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


}else{
  echo "error";
}


?>
