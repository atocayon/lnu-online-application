<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
date_default_timezone_set('Asia/Taipei');

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

$update = $con->query("UPDATE applicant_tbl SET applicationStatus = '2' , dateApprove = '$date' WHERE applicantID = '$applicantID' ");
$applicationPeriod = $con->query("SELECT application_period.id as period, applicant_tbl.applicantID as id FROM applicant_tbl INNER JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicantID = '$applicantID' ");
$resApplicantPeriod = $applicationPeriod->fetch_assoc();
$period = $resApplicantPeriod['period'];


function setDateForExam(){
  //Set Date for exam schedule
  $setDate =  new DateTime('+5 weekday'); //increment by 5 weekday from the date of approval
  $incrementDay = $setDate->format('Y-m-d'); //format the incremented weekday

  return $incrementDay;
}

$setDate = setDateForExam();

function selectApplicantsScheduledInSetDate($con, $setDate){
  //Select the applicants scheduled in set date
  return $checkDate = $con->query("SELECT * FROM exam_period WHERE exam_date = '$setDate' ORDER BY exam_time DESC");
}

$selectApplicantsScheduledInSetDate = selectApplicantsScheduledInSetDate($con, $setDate);

$numberOfApplicantsForExamDate = mysqli_num_rows($selectApplicantsScheduledInSetDate); //count number of applicants in the set date inside exam period tbl
$fetch_time = $selectApplicantsScheduledInSetDate->fetch_assoc(); //fetch the max time in the exam period tbl
$fetch_date = $selectApplicantsScheduledInSetDate->fetch_assoc(); //fetch the max date in the exam period tbl


function incrementDay($setDate){
  $increment_date = strtotime("1 weekday", strtotime($setDate)); //Increment 1 weekday of the set date for exam period
  return $new_date = date("Y-m-d", $increment_date); //format the incremented weekday from the set date for exam period
}

$new_date = incrementDay($setDate);

function forExamPeriod($con,$new_date,$numberOfApplicantsForExamDate, $applicantID, $period, $setDate, $fetch_time ,$fetch_date){
  // condition if number of applicants exceeds 50
  if ($numberOfApplicantsForExamDate > 50) {

    //Check again the content of exam period tbl where exam date is equals to the newly incremented date from the set date
    $new_checkDate = $con->query("SELECT * FROM exam_period WHERE exam_date = '$new_date' ORDER BY exam_time DESC");

    // Condition if the $new_checkDate query is true
    if ($new_checkDate) {
      $fetchNewTime = $new_checkDate->fetch_assoc(); //fetch the data from the $new_checkDate query
      $res_fetchTime = $fetchNewTime['exam_time']; // get the max time from the $new_checkDate query

      $incrementTime = strtotime($res_fetchTime) + 60*30; // increment the max time in $new_checkDate query by 30 minutes
      $incrementedTime = date('H:i:s', $incrementTime); // format the incremented time

      $setTimeLimit->setTime(17, 00); // set limit time only by 5:00 pm
      $timelimit = $setTimeLimit->format('H:i:s'); //format the time limit

      // Condition if the incremented time exceeds to the set time limit
      if ($incrementedTime > $timelimit) {
        return incrementDay($new_date);
      }else{
        $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$new_date', '$incrementedTime', '$period', 'n/a')");
        if ($insertForExam) {
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
            $mail->Subject = 'Congratulation! Your Application in Leyte Normal University has been approved';
            $mail->Body    = '<b>Exam Schedule<b><br><b>Date: '.$new_date.'</b><br><b>Time:'.$incrementedTime.'</b>';

            $mail->send();
            echo 'Message has been sent';
            return header("Location: index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }
      }

    }
    // Condition if the $new_checkDate query is false
    else{
      $new_date->setTime(07,00,00);
      $setTime = $new_date->format('H:i:s');

      $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$new_date', '$setTime', '$period', 'n/a')");

      if ($insertForExam) {
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
          $mail->Subject = 'Congratulation! Your Application in Leyte Normal University has been approved';
          $mail->Body    = '<b>Exam Schedule<b><br><b>Date: '.$new_date.'</b><br><b>Time:'.$setTime.'</b>';

          $mail->send();
          echo 'Message has been sent';
          return header("Location: index.php");
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      }
    }

  }
  //condition if number of applicants doesn't exceeds 50
  else{
    $incrementTime = strtotime($fetch_time) + 60*30; // increment the max time in $new_checkDate query by 30 minutes
    $incrementedTime = date('H:i:s', $incrementTime); // format the incremented time

    $setTimeLimit->setTime(17, 00); // set limit time only by 5:00 pm
    $timelimit = $setTimeLimit->format('H:i:s'); //format the time limit

    // Condition if the incremented time exceeds to the set time limit
    if ($incrementedTime > $timelimit) {
      return incrementDay($setDate);
    }else{

      $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$setDate', '$incrementedTime', '$period', 'n/a')");

      if ($insertForExam) {
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
          $mail->Subject = 'Congratulation! Your Application in Leyte Normal University has been approved';
          $mail->Body    = '<b>Exam Schedule<b><br><b>Date: '.$setDate.'</b><br><b>Time:'.$incrementedTime.'</b>';

          $mail->send();
          echo 'Message has been sent';
          return header("Location: index.php");
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      }



    }
  }
}

if ($update) {
  $forExamPeriod = forExamPeriod($con,$new_date,$numberOfApplicantsForExamDate, $applicantID, $period, $setDate, $fetch_time ,$fetch_date);
}else{
  echo "error".mysqli_error($con);
}


?>
