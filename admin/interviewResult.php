<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

$id = $_POST['id'];
$grammar = $_POST['grammar'];
$clarity = $_POST['clarity'];
$fluency = $_POST['fluency'];
$developmentDeliveryOfInfo = $_POST['developmentDeliveryOfInfo'];
$interest = $_POST['interest'];

$getApplication_period = $con->query("SELECT * FROM applicant_tbl WHERE applicantID = '$id'");
$res_getApplicationPeriod = $getApplication_period->fetch_assoc();
$application_period = $res_getApplicationPeriod['applicationPeriod'];


$insert = $con->query("INSERT INTO interview_result (
  applicantID,
  grammar,
  clarity,
  fluency,
  development_delivery_of_info,
  interest,
  application_period
) VALUES (
  '$id',
  '$grammar',
  '$clarity',
  '$fluency',
  '$developmentDeliveryOfInfo',
  '$interest',
  '$application_period'
)");

if ($insert) {
  $update = $con->query("UPDATE applicant_tbl SET applicationStatus = 4 WHERE applicantID = '$id'");
  if ($update) {
    echo json_encode(array("insert" => "success"));
  }

}else{
  echo mysqli_error($con);
}

?>
