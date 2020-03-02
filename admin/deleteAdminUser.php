<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);
session_start();


$id = $_POST['id'];


$query = $con->query("DELETE FROM admin_accounts WHERE id = '$id'");
if ($query) {
  echo json_encode(array("delete" => "success"));
}else{
  echo mysqli_error($con);
}

?>
