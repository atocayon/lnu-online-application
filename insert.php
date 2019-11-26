<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

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
$generalWeightedAverage = $_POST["generalWeightedAverage"];
$membershipOrganization = $_POST["membershipOrganization"];
$hobbiesTalentsInterest = $_POST["hobbiesTalentsInterest"];

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
$thirdSchoolAwardReceived = $_POST["thirdSchoolAwardReceived"];

$fourthSchoolName = $_POST["fourthSchoolName"];
$fourthSchoolAddress = $_POST["fourthSchoolAddress"];
$fourthSchoolLevel = $_POST["fourthSchoolLevel"];
$fourthSchoolInclusiveDate = $_POST["fourthSchoolInclusiveDate"];
$fourthSchoolAwardReceived = $_POST["fourthSchoolAwardReceived"];

$firstPersonReferenceName = $_POST["firstPersonReferenceName"];
$firstPersonReferenceAddress = $_POST["firstPersonReferenceAddress"];
$firstPersonReferenceContactNum = $_POST["firstPersonReferenceContactNum"];

$secondPersonReferenceName = $_POST["secondPersonReferenceName"];
$secondPersonReferenceAddress = $_POST["secondPersonReferenceAddress"];
$secondPersonReferenceContactNum = $_POST["secondPersonReferenceContactNum"];

$insert_applicant_tbl = $con->query("INSERT INTO applicant_tbl (
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
)");


$insert_guardian_tbl = $con->query("INSERT INTO guardian_tbl (
  applicantID,
  name,
  occupation,
  contactNo
) VALUES (
  '$applicant_id',
  '$guardianName',
  '$guardianOccupation',
  '$contactNumber'
)");

$insert_typeSchoolLastAttended_tbl = $con->query("INSERT INTO school_last_attended(
  applicantID,
  type,
  category,
  generalWeightedAverage,
  membershipOrganization,
  hobbiesTalentsInterest
) VALUES (
  '$applicant_id',
  '$typeOfSchool',
  '$categoryOfSchool',
  '$generalWeightedAverage',
  '$membershipOrganization',
  '$hobbiesTalentsInterest'
)");



try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO schoolattended_tbl(
      applicantID,
      schoolName,
      address,
      level,
      inclusiveDate,
      honorsAwardsReceived
    ) VALUES (
      '$applicant_id',
      '$firstSchoolName',
      '$firstSchoolAddress',
      '$firstSchoolLevel',
      '$firstSchoolInclusiveDate',
      '$firstSchoolAwardReceived'
    )");
    $conn->exec("INSERT INTO schoolattended_tbl(
      applicantID,
      schoolName,
      address,
      level,
      inclusiveDate,
      honorsAwardsReceived
    ) VALUES(
      '$applicant_id',
      '$secondSchoolName',
      '$secondSchoolAddress',
      '$secondSchoolLevel',
      '$secondSchoolInclusiveDate',
      '$secondSchoolAwardReceived'
    )");
    $conn->exec("INSERT INTO schoolattended_tbl(
      applicantID,
      schoolName,
      address,
      level,
      inclusiveDate,
      honorsAwardsReceived
    ) VALUES(
      '$applicant_id',
      '$thirdSchoolName',
      '$thirdSchoolAddress',
      '$thirdSchoolLevel',
      '$thirdSchoolInclusiveDate',
      '$thirdSchoolAwardReceived'
    )");
    $conn->exec(
      "INSERT INTO schoolattended_tbl(
        applicantID,
        schoolName,
        address,
        level,
        inclusiveDate,
        honorsAwardsReceived
      ) VALUES(
        '$applicant_id',
        '$fourthSchoolName',
        '$fourthSchoolAddress',
        '$fourthSchoolLevel',
        '$fourthSchoolInclusiveDate',
        '$fourthSchoolAwardReceived'
      )"
    );

    // commit the transaction
    $conn->commit();
    // echo json_encode(array("insertApplicant" => "success"));
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

    $conn = null;




    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO characterreference_tbl(
      applicantID,
      name,
      address,
      contactNo
    ) VALUES(
      '$applicant_id',
      '$firstPersonReferenceName',
      '$firstPersonReferenceAddress',
      '$firstPersonReferenceContactNum'
    )");
    $conn->exec("INSERT INTO characterreference_tbl(
      applicantID,
      name,
      address,
      contactNo
    ) VALUES (
      '$applicant_id',
      '$secondPersonReferenceName',
      '$secondPersonReferenceAddress',
      '$secondPersonReferenceContactNum'
    )");


    // commit the transaction
    $conn->commit();
    // echo json_encode(array("insertApplicant" => "success"));
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;


echo json_encode(array("insertApplicant" => "success"));








 ?>
