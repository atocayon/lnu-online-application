<?php
session_start();
date_default_timezone_set('Asia/Taipei');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


require '../con_f/db/db.php';


$applicantID = $_POST['id'];
$office = $_POST['office'];
$query = $con->query("UPDATE applicant_tbl SET applicationStatus = 5 WHERE applicantID = '$applicantID'");

if ($query) {
  $select = $con->query("SELECT * FROM office WHERE id = '$office'");
  $res = $select->fetch_assoc();
  $officeName = $res['course'];

  $select1 = $con->query("SELECT * FROM applicant_tbl WHERE applicantID = '$applicantID'");
  $res1 = $select1->fetch_assoc();
  $email = $res1['emailAdd'];
  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lnuonlineapplication@gmail.com';                     // SMTP username
    $mail->Password   = 'mvwcsouggvgekazz';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('lnuonlineapplication@gmail.com', 'Leyte Normal University');
    $mail->addAddress($email);     // Add a recipient             // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Leyte Normal University Online Application';
    $mail->Body    = '<b>Congratulation!</b>
    You have been qualified in! '.$officeName.'
    ';

    $mail->send();
    echo 'Message has been sent';
    echo json_encode(array("update" => "success"));
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}else{
  echo mysqli_error($con);
}



?>
