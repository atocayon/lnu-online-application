<?php
require '../con_f/db/db.php';


$id = $_POST['id'];

$applicant_tbl = $con->query("SELECT * FROM applicant_tbl WHERE applicantID = '$id'");
$fetch_applicant = $applicant_tbl->fetch_assoc();

$characterreference_tbl = $con->query("SELECT * FROM characterreference_tbl WHERE applicantID = '$id'");
$fetch_characterreference = array();

while($res = mysqli_fetch_array($characterreference_tbl)){
  array_push($fetch_characterreference, array("reference" => [$res['name'], $res['address'], $res['contactNo']]));
}

$guardian_tbl = $con->query("SELECT * FROM guardian_tbl WHERE applicantID = '$id'");
$fetch_guardian = $guardian_tbl->fetch_assoc();

$schoolattended_tbl = $con->query("SELECT * FROM schoolattended_tbl WHERE applicantID = '$id'");
$fetch_schoolattended = array();
while($row = mysqli_fetch_array($schoolattended_tbl)){
  array_push($fetch_schoolattended, array("school" => [$row['schoolName'], $row['address'], $row['level'], $row['inclusiveDate'], $row['honorsAwardsReceived']]));
}

$school_last_attended = $con->query("SELECT * FROM school_last_attended WHERE applicantID = '$id'");
$fetch_schoolLastAttended = $school_last_attended->fetch_assoc();

$applicationPeriod = $fetch_applicant['applicationPeriod'];
$selectSchoolYear = $con->query("SELECT * FROM application_period WHERE id = '$applicationPeriod'");
$schoolYear = $selectSchoolYear->fetch_assoc();

echo json_encode(array(
  "applicationType" => $fetch_applicant['applicationType'],
  "returneeMonth" => $fetch_applicant['returneeMonth'],
  "returneeYear" => $fetch_applicant['returneeYear'],
  "returneeSelectedCourse" => $fetch_applicant['returneeSelectedCourse'],
  "schoolYear" => $schoolYear['school_year'],
  "term" => $schoolYear['term'],
  "firstCoursePreference" => $fetch_applicant['firstCoursePreference'],
  "secondCoursePreference" => $fetch_applicant['secondCoursePreference'],
  "returneePasser" => $fetch_applicant['returneePasser'],
  "lname" => $fetch_applicant['lname'],
  "fname" => $fetch_applicant['fname'],
  "mname" => $fetch_applicant['mname'],
  "dateOfBirth" => $fetch_applicant['dateOfBirth'],
  "age" => $fetch_applicant['age'],
  "sex" => $fetch_applicant['sex'],
  "civilStatus" => $fetch_applicant['civilStatus'],
  "citizenship" => $fetch_applicant['citizenship'],
  "completeHomeAddress" => $fetch_applicant['completeHomeAddress'],
  "completeCityAddress" => $fetch_applicant['completeCityAddress'],
  "telNo" => $fetch_applicant['telNo'],
  "mobileNo" => $fetch_applicant['mobileNo'],
  "emailAdd" => $fetch_applicant['emailAdd'],
  "guardianName" => $fetch_guardian['name'],
  "guardianOccupation" => $fetch_guardian['occupation'],
  "guardianContactNo" => $fetch_guardian['contactNo'],
  "typeOfSchoolLastAttended" => $fetch_schoolLastAttended['type'],
  "categoryOfSchoolLastAttended" => $fetch_schoolLastAttended['category'],
  "schoolAttended" => $fetch_schoolattended,
  "gwa" => $fetch_schoolLastAttended['generalWeightedAverage'],
  "membershipOrganization" => $fetch_schoolLastAttended['membershipOrganization'],
  "hobbiesAndTalent" => $fetch_schoolLastAttended['hobbiesTalentsInterest'],
  "character_reference" => $fetch_characterreference,
  "applicationDate" => $fetch_applicant['applicationDate']
));
?>
