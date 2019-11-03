<?php
$con = mysqli_connect("localhost","root","","lnu-online-application");

if (mysqli_connect_errno()) {
  print_r("Failed to connect to MYSQL: ". mysqli_connect_error());
}
$applicationDate = $_POST["applicationDate"];
$applicant_id = $_POST["appicantID"];
$applicationType = $_POST["applicationType"];
$returneeMonth = $_POST["returneeMonth"];
$returneeYear = $_POST["returneeYear"];
$returneePasser = $_POST["returneePasser"];
$returneeSelectedCourse = $_POST["returneeSelectedCourse"];
$firstCoursePreference = $_POST["firstCoursePreference"];
$secondCoursePreference = $_POST["secondCoursePreference"];
$lastName = $_POST["lastName"];
$firstName = $_POST["firstName"];
$middleName = $_POST["middleName"];
$birthDay = $_POST["birthDay"];
$age = $_POST["age"];
$sex = $_POST["sex"];
$status = $_POST["status"];
$citizenship = $_POST["citizenship"];
$completeHomeAddress = $_POST["completeHomeAddress"];
$completeCityAddress = $_POST["completeCityAddress"];
$telNumber = $_POST["telNumber"];
$mobileNumber = $_POST["mobileNumber"];
$emailAddress = $_POST["emailAddress"];

$guardianName = $_POST["guardianName"];
$guardianOccupation = $_POST["guardianOccupation"];
$contactNumber = $_POST["contactNumber"];

$typeOfSchool = $_POST["typeOfSchool"];
$categoryOfSchool = $_POST["categoryOfSchool"];
$firstSchoolName = $_POST["firstSchoolName"];
$firstSchoolAddress = $_POST["firstSchoolAddress"];
$firstSchoolLevel = $_POST["firstSchoolLevel"];
$firstSchoolInclusiveDate = $_POST["firstSchoolInclusiveDate"];
$firstSchoolAwardReceived = $_POST["firstSchoolAwardReceived"];
$secondSchoolName = $_POST["secondSchoolName"];
$secondSchoolAddress = $_POST["secondSchoolAddress"];
$secondSchoolLevel = $_POST["secondSchoolLevel"];
$secondSchoolInclusiveDate = $_POST["secondSchoolInclusiveDate"];
$secondSchoolAwardReceived = $_POST["secondSchoolAwardReceived"];
$thirdSchoolName = $_POST["thirdSchoolName"];
$thirdSchoolAddress = $_POST["thirdSchoolAddress"];
$thirdSchoolLevel = $_POST["thirdSchoolLevel"];
$thirdSchoolInclusiveDate = $_POST["thirdSchoolInclusiveDate"];
$fourthSchoolName = $_POST["fourthSchoolName"];
$fourthSchoolAddress = $_POST["fourthSchoolAddress"];
$fourthSchoolLevel = $_POST["fourthSchoolLevel"];
$fourthSchoolInclusiveDate = $_POST["fourthSchoolInclusiveDate"];
$fourthSchoolAwardReceived = $_POST["fourthSchoolAwardReceived"];
$generalWeightedAverage = $_POST["generalWeightedAverage"];
$membershipOrganization = $_POST["membershipOrganization"];
$hobbiesTalentsInterest = $_POST["hobbiesTalentsInterest"];
$firstPersonReferenceName = $_POST["firstPersonReferenceName"];
$firstPersonReferenceAddress = $_POST["firstPersonReferenceAddress"];
$firstPersonReferenceContactNum = $_POST["firstPersonReferenceContactNum"];
$secondPersonReferenceName = $_POST["secondPersonReferenceName"];
$secondPersonReferenceAddress = $_POST["secondPersonReferenceAddress"];
$secondPersonReferenceContactNum = $_POST["secondPersonReferenceContactNum"];

$insert_tbl_applicant = "INSERT INTO applicant_tbl (
  applicantID,
  applicationType,
  returneeMonth,
  returneeYear,
  returneePasser,
  returneeSelectedCourse,
  firstCoursePreference,
  secondCoursePreference,
  lname,
  fname,
  mname,
  dateOfBirth,
  age,
  sex,
  civilStatus,
  citizenship,
  completeHomeAddress,
  completeCityAddress,
  telNo,
  mobileNo,
  emailAdd,
  applicationStatus,
  applicationDate,
  dateApprove
) VALUES (
  '$applicant_id',
  '$applicationType',
  '$returneeMonth',
  '$returneeYear',
  '$returneePasser',
  '$returneeSelectedCourse',
  '$firstCoursePreference',
  '$secondCoursePreference',
  '$lastName',
  '$firstName',
  '$middleName',
  '$birthDay',
  '$age',
  '$sex',
  '$status',
  '$citizenship',
  '$completeHomeAddress',
  '$completeCityAddress',
  '$telNumber',
  '$mobileNumber',
  '$emailAddress',
  0,
  '$applicationDate',
  0000-00-00
)";


// $insert_tbl_guardian = "INSERT INTO guardian_ tbl () VALUES ()";


if (mysqli_query($con,$insert_tbl_applicant)) {
  $last_id = mysqli_insert_id($conn);
  echo json_encode(array("insertApplicant" => $last_id));
}else{
  echo json_encode(array("insertApplicant" => mysqli_error($con)));
}






 ?>
