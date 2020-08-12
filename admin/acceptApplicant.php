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


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

$applicantID = $_GET['id'];
$email = $_GET['email'];
$date = date('Y-m-d');
$time = date('H:i:s');

$update = $con->query("UPDATE applicant_tbl
  SET applicationStatus = '2' ,
  dateApprove = '$date'
  WHERE
  applicantID = '$applicantID' ");

$applicationPeriod = $con->query("SELECT
  application_period.id as period,
  applicant_tbl.applicantID as id,
  applicant_tbl.emailAdd as email
  FROM applicant_tbl
  INNER JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id
  WHERE applicant_tbl.applicantID = '$applicantID' ");

$resApplicantPeriod = $applicationPeriod->fetch_assoc();
$period = $resApplicantPeriod['period'];

function setDateForExam(){
  //Set Date for exam schedule
  $setDate =  new DateTime('+2 weekday'); //increment by 2 weekday from the date of approval
  return $setDate->format('Y-m-d'); //format the incremented weekday


}

$setDate = setDateForExam();//call setDatForExam function

function selectApplicantsScheduledInSetDate($con, $setDate){
  //Select the applicants scheduled in set date
  return $checkDate = $con->query("SELECT * FROM
    exam_period WHERE exam_date = '$setDate'
    ORDER BY exam_date DESC");
}

$selectApplicantsScheduledInSetDate = selectApplicantsScheduledInSetDate($con, $setDate);

$numberOfApplicantsForExamDate = mysqli_num_rows($selectApplicantsScheduledInSetDate); //count number of applicants in the set date inside exam period tbl
//fetch the max time in the exam period tbl

$numberOfApplicantsForExamDate > 0 ? $res = $selectApplicantsScheduledInSetDate->fetch_assoc() : $res = "";

function incrementDay($setDate){
  $increment_date = strtotime("1 weekday", strtotime($setDate)); //Increment 1 weekday of the set date for exam period
  return $new_date = date("Y-m-d", $increment_date); //format the incremented weekday from the set date for exam period
}

$new_date = incrementDay($setDate);

function forExamPeriod($con,$new_date,$numberOfApplicantsForExamDate, $applicantID, $period, $setDate, $res,$email,$mail){

  if ($numberOfApplicantsForExamDate > 0 && $res !== "") {
    $fetch_date = $res['exam_date'];

    // condition if number of applicants exceeds 350
    if ($numberOfApplicantsForExamDate >= 350) {
          $date = new DateTime($new_date);
          $newSetDate = $date->format('Y-m-d');
          return incrementDay($newSetDate);

    }
    //condition if number of applicants doesn't exceeds 350
    else{

      $date = new DateTime($new_date);
      $newSetDate = $date->format('Y-m-d');


        $insertForExam = $con->query("INSERT INTO
          exam_period (applicantID,
            exam_date,
            application_period_id,
            remarks) VALUES ('$applicantID', '$newSetDate', '$period')");

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
            $mail->Body    = '<b>Congratulation!</b>
            Your Application in Leyte Normal University has been approved!
            <br>
            <b>Exam Schedule<b>
            <br>
            <b>Date: '.$newSetDate.'</b>';

            $mail->send();
            echo 'Message has been sent';
            return header("Location: index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }





    }

  }else{
    $date = new DateTime($setDate);
    $newSetDate = $date->format('Y-m-d');



      $insertForExam = $con->query("INSERT INTO
        exam_period (applicantID,
          exam_date,
          application_period_id,
          remarks) VALUES ('$applicantID',
            '$newSetDate',
            '$period',
            'n/a')");

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
          $mail->Body    = '<b>Congratulation!</b>
          Your Application in Leyte Normal University has been approved<br>
          <b>Exam Schedule<b>
          <br>
          <b>Date: '.$newSetDate.'</b>';

          $mail->send();
          echo 'Message has been sent';
          return header("Location: index.php");
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }


  }

}

if ($update) {
  $forExamPeriod = forExamPeriod($con,$new_date,$numberOfApplicantsForExamDate, $applicantID, $period, $setDate, $res,$email,$mail);
}else{
  echo "error".mysqli_error($con);
}


?>
