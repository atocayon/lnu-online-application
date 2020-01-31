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

$update = $con->query("UPDATE applicant_tbl SET applicationStatus = '2' , dateApprove = '$date' WHERE applicantID = '$applicantID' ");
$applicationPeriod = $con->query("SELECT application_period.id as period, applicant_tbl.applicantID as id, applicant_tbl.emailAdd as email FROM applicant_tbl INNER JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicantID = '$applicantID' ");
$resApplicantPeriod = $applicationPeriod->fetch_assoc();
$period = $resApplicantPeriod['period'];


function setDateForExam(){
  //Set Date for exam schedule
  $setDate =  new DateTime('+5 weekday'); //increment by 5 weekday from the date of approval
  return $setDate->format('Y-m-d'); //format the incremented weekday


}

$setDate = setDateForExam();

function selectApplicantsScheduledInSetDate($con, $setDate){
  //Select the applicants scheduled in set date
  return $checkDate = $con->query("SELECT * FROM exam_period WHERE exam_date = '$setDate' ORDER BY exam_time DESC");
}

$selectApplicantsScheduledInSetDate = selectApplicantsScheduledInSetDate($con, $setDate);

$numberOfApplicantsForExamDate = mysqli_num_rows($selectApplicantsScheduledInSetDate); //count number of applicants in the set date inside exam period tbl
; //fetch the max time in the exam period tbl

$numberOfApplicantsForExamDate > 0 ? $res = $selectApplicantsScheduledInSetDate->fetch_assoc() : $res = "";

function incrementDay($setDate){
  $increment_date = strtotime("1 weekday", strtotime($setDate)); //Increment 1 weekday of the set date for exam period
  return $new_date = date("Y-m-d", $increment_date); //format the incremented weekday from the set date for exam period
}

$new_date = incrementDay($setDate);

function forExamPeriod($con,$new_date,$numberOfApplicantsForExamDate, $applicantID, $period, $setDate, $res,$email,$mail){

  if ($numberOfApplicantsForExamDate > 0 && $res !== "") {
    $fetch_time = $res['exam_time'];
    $fetch_date = $res['exam_date'];

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

        $date = new DateTime($new_date);
        $newSetDate = $date->format('Y-m-d');
        $date->setTime(17, 00); // set limit time only by 5:00 pm
        $timelimit = $date->format('H:i:s'); //format the time limit

        // Condition if the incremented time exceeds to the set time limit
        if ($incrementedTime > $timelimit) {
          return incrementDay($newSetDate);
        }else{
          $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$newSetDate', '$incrementedTime', '$period', 'n/a')");
          if ($insertForExam) {
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
              $mail->Body    = '<b>Congratulation!</b> Your Application in Leyte Normal University has been approved<br><b>Exam Schedule<b><br><b>Date: '.$new_date.'</b><br><b>Time:'.$incrementedTime.'</b>';

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
        $date = new DateTime($new_date);
        $newSetDate = $date->format('Y-m-d');
        $date->setTime(07,00,00);
        $setTime = $date->format('H:i:s');

        $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$newSetDate ', '$setTime', '$period', 'n/a')");


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
            $mail->Body    = '<b>Congratulation!</b> Your Application in Leyte Normal University has been approved<br><b>Exam Schedule<b><br><b>Date: '.$new_date.'</b><br><b>Time:'.$setTime.'</b>';

            $mail->send();
            echo 'Message has been sent';
            return header("Location: index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

      }

    }
    //condition if number of applicants doesn't exceeds 50
    else{
      $incrementTime = strtotime($fetch_time) + 60*30; // increment the max time in $new_checkDate query by 30 minutes
      $incrementedTime = date('H:i:s', $incrementTime); // format the incremented time

      $date = new DateTime($setDate);
      $newSetDate = $date->format('Y-m-d');
      $date->setTime(17, 00); // set limit time only by 5:00 pm
      $timelimit = $date->format('H:i:s'); //format the time limit

      // Condition if the incremented time exceeds to the set time limit
      if ($incrementedTime > $timelimit) {
        return incrementDay($newSetDate);
      }else{

        $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$newSetDate', '$incrementedTime', '$period', 'n/a')");

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
            $mail->Body    = '<b>Congratulation!</b> Your Application in Leyte Normal University has been approved<br><b>Exam Schedule<b><br><b>Date: '.$setDate.'</b><br><b>Time:'.$incrementedTime.'</b>';

            $mail->send();
            echo 'Message has been sent';
            return header("Location: index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }




      }
    }

  }else{
    $date = new DateTime($setDate);
    $newSetDate = $date->format('Y-m-d');
    $date->setTime(07, 00); // set limit time only by 5:00 pm
    $time = $date->format('H:i:s'); //format the time limit


      $insertForExam = $con->query("INSERT INTO exam_period (applicantID, exam_date, exam_time, application_period_id, remarks) VALUES ('$applicantID', '$newSetDate', '$time', '$period', 'n/a')");

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
          $mail->Body    = '<b>Congratulation!</b> Your Application in Leyte Normal University has been approved<br><b>Exam Schedule<b><br><b>Date: '.$newSetDate.'</b><br><b>Time:'.$time.'</b>';

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
