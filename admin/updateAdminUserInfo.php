<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);
session_start();


$id = $_POST['id'];
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$role = $_POST['role'];
$office = $_POST['office'];

$query = $con->query("UPDATE admin_accounts SET uname = '$uname', pword = '$pword', role = '$role', office = '$office' WHERE id = '$id'");
if ($query) {
  echo json_encode(array("update" => "success"));
}else{
  echo mysqli_error($con);
}

?>
