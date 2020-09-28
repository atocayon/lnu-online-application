<?php
date_default_timezone_set('Asia/Taipei');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

session_start();
require '../con_f/db/db.php';





$applicantID = $_POST["id"];
$art = $_POST["art"];
$sci = $_POST["sci"];
$nat = $_POST["nat"];
$pro = $_POST["pro"];
$mec = $_POST["mec"];
$ind = $_POST["ind"];
$bus = $_POST["bus"];
$sel = $_POST["sel"];
$acc = $_POST["acc"];
$hum = $_POST["hum"];
$lea = $_POST["lea"];
$phy = $_POST["phy"];

$select = $con->query("SELECT * FROM applicant_tbl WHERE applicantID = '$applicantID'");
$res = $select->fetch_assoc();
$period = $res['applicationPeriod'];
$email = $res['emailAdd'];



function gettingPercentOfArt($art){
  if ($art >= 1 && $art <= 3) {
    return 3;
  }else if ($art >= 4 && $art <= 6){
    return 5;
  }else if ($art >= 7 && $art <= 9){
    return 10;
  }else if ($art >= 10 && $art <= 11){
    return 15;
  }else if ($art == 12){
    return 20;
  }else if($art >= 13 && $art <= 14){
    return 25;
  }else if ($art >= 15 && $art <= 16){
    return 33;
  }else if ($art >= 17 && $art <= 18){
    return 40;
  }else if ($art >= 19 && $art <= 20){
    return 50;
  }else if ($art >= 21 && $art <= 22){
    return 60;
  }else if ($art >= 23 && $art <= 24){
    return 67;
  }else if ($art >= 25 && $art <= 26){
    return 75;
  }else if ($art == 27){
    return 80;
  }else if ($art >= 28 && $art <= 29){
    return 85;
  }else if ($art >= 30 && $art <= 32){
    return 90;
  }else if ($art >= 33 && $art <= 35){
    return 95;
  }else if ($art >= 36 && $art <= 38){
    return 97;
  }else if ($art >= 39 && $art <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfSci($sci){
  if ($sci == 1) {
    return 3;
  }else if ($sci == 2){
    return 5;
  }else if ($sci == 3){
    return 10;
  }else if ($sci >= 4 && $sci <= 5){
    return 15;
  }else if ($sci >= 6 && $sci <= 7){
    return 20;
  }else if($sci == 8){
    return 25;
  }else if ($sci >= 9 && $sci <= 10){
    return 33;
  }else if ($sci >= 11 && $sci <= 12){
    return 40;
  }else if ($sci >= 13 && $sci <= 15){
    return 50;
  }else if ($sci >= 16 && $sci <= 17){
    return 60;
  }else if ($sci == 18){
    return 67;
  }else if ($sci >= 19 && $sci <= 20){
    return 75;
  }else if ($sci >= 21 && $sci <= 22){
    return 80;
  }else if ($sci >= 23 && $sci <= 24){
    return 85;
  }else if ($sci >= 25 && $sci <= 27){
    return 90;
  }else if ($sci >= 28 && $sci <= 29){
    return 95;
  }else if ($sci >= 30 && $sci <= 32){
    return 97;
  }else if ($sci >= 33 && $sci <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfNat($nat){
  if ($nat == 1) {
    return 3;
  }else if ($nat == 2){
    return 5;
  }else if ($nat == 3){
    return 10;
  }else if ($nat == 4 ){
    return 15;
  }else if ($nat >= 5 && $nat <= 6){
    return 20;
  }else if($nat >= 7 && $nat <= 8){
    return 25;
  }else if ($nat >= 9 && $nat <= 11){
    return 33;
  }else if ($nat >= 12 && $nat <= 13){
    return 40;
  }else if ($nat >= 14 && $nat <= 16){
    return 50;
  }else if ($nat >= 17 && $nat <= 18){
    return 60;
  }else if ($nat >= 19 && $nat <= 21){
    return 67;
  }else if ($nat >= 22 && $nat <= 23){
    return 75;
  }else if ($nat >= 24 && $nat <= 25){
    return 80;
  }else if ($nat >= 26 && $nat <= 28){
    return 85;
  }else if ($nat >= 29 && $nat <= 31){
    return 90;
  }else if ($nat >= 32 && $nat <= 34){
    return 95;
  }else if ($nat >= 35 && $nat <= 38){
    return 97;
  }else if ($nat >= 39 && $nat <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfPro($pro){
  if ($pro == 1) {
    return 3;
  }else if ($pro >= 2 && $pro <= 3){
    return 5;
  }else if ($pro >= 4 && $pro <= 5){
    return 10;
  }else if ($pro >= 6 && $pro <= 7 ){
    return 15;
  }else if ($pro >= 8 && $pro <= 9){
    return 20;
  }else if($pro >= 10 && $pro <= 11){
    return 25;
  }else if ($pro >= 12 && $pro <= 13){
    return 33;
  }else if ($pro >= 14 && $pro <= 15){
    return 40;
  }else if ($pro >= 16 && $pro <= 17){
    return 50;
  }else if ($pro >= 18 && $pro <= 19){
    return 60;
  }else if ($pro >= 20 && $pro <= 21){
    return 67;
  }else if ($pro >= 22 && $pro <= 23){
    return 75;
  }else if ($pro >= 24 && $pro <= 25){
    return 80;
  }else if ($pro >= 26 && $pro <= 27){
    return 85;
  }else if ($pro >= 28 && $pro <= 30){
    return 90;
  }else if ($pro >= 31 && $pro <= 33){
    return 95;
  }else if ($pro >= 34 && $pro <= 36){
    return 97;
  }else if ($pro >= 37 && $pro <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfMec($mec){
  if ($mec == 1) {
    return 3;
  }else if ($mec == 2){
    return 5;
  }else if ($mec == 3){
    return 10;
  }else if ($mec == 4){
    return 15;
  }else if ($mec >= 5 && $mec <= 6){
    return 20;
  }else if($mec >= 7 && $mec <= 8){
    return 25;
  }else if ($mec >= 9 && $mec <= 10){
    return 33;
  }else if ($mec >= 11 && $mec <= 12){
    return 40;
  }else if ($mec >= 13 && $mec <= 14){
    return 50;
  }else if ($mec >= 15 && $mec <= 16){
    return 60;
  }else if ($mec >= 17 && $mec <= 18){
    return 67;
  }else if ($mec >= 19 && $mec <= 20){
    return 75;
  }else if ($mec >= 21 && $mec <= 22){
    return 80;
  }else if ($mec >= 23 && $mec <= 24){
    return 85;
  }else if ($mec >= 25 && $mec <= 27){
    return 90;
  }else if ($mec >= 28 && $mec <= 30){
    return 95;
  }else if ($mec >= 31 && $mec <= 33){
    return 97;
  }else if ($mec >= 34 && $mec <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfInd($ind){
  if ($ind == 0) {
    return 3;
  }else if ($ind == 1){
    return 5;
  }else if ($ind == 2){
    return 10;
  }else if ($ind == 3){
    return 15;
  }else if ($ind == 4){
    return 20;
  }else if($ind >= 5 && $ind <= 6){
    return 25;
  }else if ($ind >= 7 && $ind <= 8){
    return 33;
  }else if ($ind == 9){
    return 40;
  }else if ($ind >= 10 && $ind <= 11){
    return 50;
  }else if ($ind >= 12 && $ind <= 13){
    return 60;
  }else if ($ind == 14){
    return 67;
  }else if ($ind >= 15 && $ind <= 16){
    return 75;
  }else if ($ind == 17){
    return 80;
  }else if ($ind >= 18 && $ind <= 19){
    return 85;
  }else if ($ind >= 20 && $ind <= 21){
    return 90;
  }else if ($ind >= 22 && $ind <= 24){
    return 95;
  }else if ($ind >= 25 && $ind <= 26){
    return 97;
  }else if ($ind >= 27 && $ind <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfBus($bus){
  if ($bus == 1) {
    return 3;
  }else if ($bus == 2){
    return 5;
  }else if ($bus >= 3 && $bus <= 4){
    return 10;
  }else if ($bus >= 5 && $bus <= 6){
    return 15;
  }else if ($bus >= 7 && $bus <= 8){
    return 20;
  }else if($bus >= 9 && $bus <= 10){
    return 25;
  }else if ($bus >= 11 && $bus <= 12){
    return 33;
  }else if ($bus >= 13 && $bus <= 14){
    return 40;
  }else if ($bus >= 15 && $bus <= 16){
    return 50;
  }else if ($bus >= 17 && $bus <= 18){
    return 60;
  }else if ($bus >= 19 && $bus <= 20){
    return 67;
  }else if ($bus >= 21 && $bus <= 22){
    return 75;
  }else if ($bus >= 23 && $bus <= 24){
    return 80;
  }else if ($bus >= 25 && $bus <= 26){
    return 85;
  }else if ($bus >= 27 && $bus <= 29){
    return 90;
  }else if ($bus >= 30 && $bus <= 32){
    return 95;
  }else if ($bus >= 33 && $bus <= 35){
    return 97;
  }else if ($bus >= 36 && $bus <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfSel($sel){
  if ($sel == 1) {
    return 3;
  }else if ($sel == 2){
    return 5;
  }else if ($sel == 3){
    return 10;
  }else if ($sel >= 4 && $sel <= 5){
    return 15;
  }else if ($sel >= 6 && $sel <= 7){
    return 20;
  }else if($sel == 8){
    return 25;
  }else if ($sel >= 9 && $sel <= 10){
    return 33;
  }else if ($sel >= 11 && $sel <= 12){
    return 40;
  }else if ($sel >= 13 && $sel <= 14){
    return 50;
  }else if ($sel >= 15 && $sel <= 16){
    return 60;
  }else if ($sel >= 17 && $sel <= 18){
    return 67;
  }else if ($sel == 19){
    return 75;
  }else if ($sel >= 20 && $sel <= 21){
    return 80;
  }else if ($sel == 22){
    return 85;
  }else if ($sel >= 23 && $sel <= 25){
    return 90;
  }else if ($sel >= 26 && $sel <= 28){
    return 95;
  }else if ($sel >= 29 && $sel <= 30){
    return 97;
  }else if ($sel >= 31 && $sel <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfAcc($acc){
  if ($acc == 1) {
    return 3;
  }else if ($acc == 2){
    return 5;
  }else if ($acc >= 3 && $acc <= 4){
    return 10;
  }else if ($acc >= 5 && $acc <= 6){
    return 15;
  }else if ($acc >= 7 && $acc <= 8){
    return 20;
  }else if($acc == 9){
    return 25;
  }else if ($acc >= 10 && $acc <= 11){
    return 33;
  }else if ($acc == 12){
    return 40;
  }else if ($acc >= 13 && $acc <= 14){
    return 50;
  }else if ($acc >= 15 && $acc <= 16){
    return 60;
  }else if ($acc == 17){
    return 67;
  }else if ($acc >= 18 && $acc <= 19){
    return 75;
  }else if ($acc == 20){
    return 80;
  }else if ($acc >= 21 && $acc <= 22){
    return 85;
  }else if ($acc >= 23 && $acc <= 24){
    return 90;
  }else if ($acc >= 25 && $acc <= 26){
    return 95;
  }else if ($acc >= 27 && $acc <= 29){
    return 97;
  }else if ($acc >= 30 && $acc <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfHum($hum){
  if ($hum == 1) {
    return 3;
  }else if ($hum == 2){
    return 5;
  }else if ($hum >= 3 && $hum <= 4){
    return 10;
  }else if ($hum >= 5 && $hum <= 6){
    return 15;
  }else if ($hum >= 7 && $hum <= 8){
    return 20;
  }else if($hum >= 9 && $hum <= 10){
    return 25;
  }else if ($hum >= 11 && $hum <= 12){
    return 33;
  }else if ($hum >= 13 && $hum <= 14){
    return 40;
  }else if ($hum >= 15 && $hum <= 16){
    return 50;
  }else if ($hum >= 17 && $hum <= 18){
    return 60;
  }else if ($hum >= 19 && $hum <= 20){
    return 67;
  }else if ($hum >= 21 && $hum <= 22){
    return 75;
  }else if ($hum >= 23 && $hum <= 24){
    return 80;
  }else if ($hum >= 25 && $hum <= 26){
    return 85;
  }else if ($hum >= 27 && $hum <= 29){
    return 90;
  }else if ($hum >= 30 && $hum <= 32){
    return 95;
  }else if ($hum >= 33 && $hum <= 35){
    return 97;
  }else if ($hum >= 36 && $hum <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfLea($lea){
  if ($lea == 1) {
    return 3;
  }else if ($lea >= 2 && $lea <= 3){
    return 5;
  }else if ($lea >= 4 && $lea <= 5){
    return 10;
  }else if ($lea >= 6 && $lea <= 7){
    return 15;
  }else if ($lea >= 8 && $lea <= 9){
    return 20;
  }else if($lea >= 10 && $lea <= 11){
    return 25;
  }else if ($lea >= 12 && $lea <= 13){
    return 33;
  }else if ($lea >= 14 && $lea <= 15){
    return 40;
  }else if ($lea >= 16 && $lea <= 17){
    return 50;
  }else if ($lea >= 18 && $lea <= 19){
    return 60;
  }else if ($lea >= 20 && $lea <= 21){
    return 67;
  }else if ($lea == 22){
    return 75;
  }else if ($lea >= 23 && $lea <= 24){
    return 80;
  }else if ($lea >= 25 && $lea <= 26){
    return 85;
  }else if ($lea >= 27 && $lea <= 29){
    return 90;
  }else if ($lea >= 30 && $lea <= 31){
    return 95;
  }else if ($lea >= 32 && $lea <= 34){
    return 97;
  }else if ($lea >= 35 && $lea <= 40){
    return 99;
  }else{
    return 1;
  }
}

function gettingPercentOfPhy($phy){
  if ($phy >= 2 && $phy <= 3) {
    return 3;
  }else if ($phy >= 4 && $phy <= 5){
    return 5;
  }else if ($phy >= 6 && $phy <= 7){
    return 10;
  }else if ($phy >= 8 && $phy <= 9){
    return 15;
  }else if ($phy == 10){
    return 20;
  }else if($phy >= 11 && $phy <= 12){
    return 25;
  }else if ($phy >= 13 && $phy <= 14){
    return 33;
  }else if ($phy >= 15 && $phy <= 16){
    return 40;
  }else if ($phy >= 17 && $phy <= 18){
    return 50;
  }else if ($phy >= 19 && $phy <= 20){
    return 60;
  }else if ($phy >= 21 && $phy <= 22){
    return 67;
  }else if ($phy == 23){
    return 75;
  }else if ($phy >= 24 && $phy <= 25){
    return 80;
  }else if ($phy >= 26 && $phy <= 27){
    return 85;
  }else if ($phy >= 28 && $phy <= 29){
    return 90;
  }else if ($phy >= 30 && $phy <= 32){
    return 95;
  }else if ($phy >= 33 && $phy <= 35){
    return 97;
  }else if ($phy >= 36 && $phy <= 40){
    return 99;
  }else{
    return 1;
  }
}



$artPercentage = gettingPercentOfArt($art);
$sciPercentage = gettingPercentOfSci($sci);
$natPercentage = gettingPercentOfNat($nat);
$proPercentage = gettingPercentOfPro($pro);
$mecPercentage = gettingPercentOfMec($mec);
$indPercentage = gettingPercentOfInd($ind);
$busPercentage = gettingPercentOfBus($bus);
$selPercentage = gettingPercentOfSel($sel);
$accPercentage = gettingPercentOfAcc($acc);
$humPercentage = gettingPercentOfHum($hum);
$leaPercentage = gettingPercentOfLea($lea);
$phyPercentage = gettingPercentOfPhy($phy);


$insert = $con->query("INSERT INTO exam_result (
  applicantID,
  art,
  sci,
  nat,
  pro,
  mec,
  ind,
  bus,
  sel,
  acc,
  hum,
  lea,
  phy,
  application_period
)
  VALUES (
    '$applicantID',
    '$artPercentage',
    '$sciPercentage',
    '$natPercentage',
    '$proPercentage',
    '$mecPercentage',
    '$indPercentage',
    '$busPercentage',
    '$selPercentage',
    '$accPercentage',
    '$humPercentage',
    '$leaPercentage',
    '$phyPercentage',
    '$period'
  )");



  if ($insert) {
    $update = $con->query("UPDATE applicant_tbl SET applicationStatus = 3 WHERE applicantID = '$applicantID'");
    if ($update) {
      $date = date('Y-m-d');
      $time = date('H:i:s');

      function setDateForInterview(){
        //Set Date for exam schedule
        $setDate =  new DateTime('+3 weekday'); //increment by 3 weekday from the date of approval
        return $setDate->format('Y-m-d'); //format the incremented weekday

      }

      $setDate = setDateForInterview();//call setDatForInterview function


      function selectApplicantsScheduledInSetDate($con, $setDate){
        //Select the applicants scheduled in set date
        return $checkDate = $con->query("SELECT * FROM
          interview_period WHERE interview_date = '$setDate'
          ORDER BY interview_date DESC");
      }

      $selectApplicantsScheduledInSetDate = selectApplicantsScheduledInSetDate($con, $setDate);
      $numberOfApplicantsForInterviewDate = mysqli_num_rows($selectApplicantsScheduledInSetDate); //count number of applicants in the set date inside exam period tbl
      $numberOfApplicantsForInterviewDate > 0 ? $res = $selectApplicantsScheduledInSetDate->fetch_assoc() : $res = "";

      function incrementDay($setDate){
        $increment_date = strtotime("1 weekday", strtotime($setDate)); //Increment 1 weekday of the set date for exam period
        return $new_date = date("Y-m-d", $increment_date); //format the incremented weekday from the set date for exam period
      }

      $new_date = incrementDay($setDate);


      function forInterviewPeriod($con,$new_date, $numberOfApplicantsForInterviewDate, $applicantID, $period, $setDate, $res,$email,$mail){

        if ($numberOfApplicantsForInterviewDate > 0 && $res !== "") {
          $fetch_date = $res['interview_date'];

          // condition if number of applicants exceeds 350
          if ($numberOfApplicantsForInterviewDate >= 350) {
            $date = new DateTime($new_date);
            $newSetDate = $date->format('Y-m-d');
            return incrementDay($newSetDate);

          }
          //condition if number of applicants doesn't exceeds 350
          else{
            $date = new DateTime($new_date);
            $newSetDate = $date->format('Y-m-d');

              $insertForInterview = $con->query("INSERT INTO
                  interview_period (applicantID,
                  interview_date,
                  application_period_id)
                  VALUES ('$applicantID',
                    '$newSetDate',
                    '$period')");

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
                  $mail->Body    = '<b>Congratulation in taking the entrance exam!</b>
                  You can now proceed to the interview stage of your 1st and 2nd course preference.
                  <br>
                  <b>Interview Schedule<b>
                  <br><b>Date: '.$newSetDate.'</b>';

                  $mail->send();
                  echo 'Message has been sent';
                  return 1;
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  return 1;
              }

          }

        }else{
          $date = new DateTime($setDate);
          $newSetDate = $date->format('Y-m-d');



            $insertForExam = $con->query("INSERT INTO
              interview_period (applicantID,
                interview_date,
                application_period_id
              ) VALUES ('$applicantID',
                  '$newSetDate',
                  '$period')");

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
                $mail->Body    = '<b>Congratulation in taking the entrance exam!</b>
                You can now proceed to the interview stage of your 1st and 2nd course preference.
                <br>
                <b>Exam Schedule<b>
                <br>
                <b>Date: '.$newSetDate.'</b>';

                $mail->send();

                return 1;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return 1;
            }


        }

      }

      $forInterviewPeriod = forInterviewPeriod($con,$new_date,$numberOfApplicantsForInterviewDate, $applicantID, $period, $setDate, $res,$email,$mail);

      if ($forInterviewPeriod == 1) {
        echo json_encode(array("insert" => "success"));
      }

    }else{
      echo mysqli_error($con);
    }

  }else{
    echo mysqli_error($con);
  }

?>
