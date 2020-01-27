<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  print_r("Failed to connect to MYSQL: ". mysqli_connect_error());
}

$term = $_POST['term'];
$school_year = $_POST['schoolYear'];
$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];


$query = $con->query("INSERT INTO application_period (term,school_year,dateStart,dateEnd,status) VALUES('$term','$school_year','$dateStart','$dateEnd','1')");
if ($query) {
  echo json_encode(array("insert" => "success"));
}else{
  echo("Error description: " . mysqli_error($con));
}




 ?>
