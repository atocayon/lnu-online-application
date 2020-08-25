<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();


// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


require '../con_f/db/db.php';

$applicantID = $_GET['id'];
$email = $_GET['email'];
$date = date('Y-m-d');

$reject = $con->query("UPDATE applicant_tbl SET applicationStatus = '0' WHERE applicantID = '$applicantID'");

if ($reject) {
          try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'info.leytenormaluniversity@gmail.com';                     // SMTP username
            $mail->Password   = 's v g y i n t t f y u l g n b m';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('info.leytenormaluniversity@gmail.com', 'Leyte Normal University');
            $mail->addAddress($email);     // Add a recipient             // Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Leyte Normal University Online Application';
            $mail->Body    = 'Your application has been disapproved';

            $mail->send();
            echo 'Message has been sent';
            header("Location: index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


}

?>
