<?php
session_start();
require '../con_f/db/db.php';

if (mysqli_connect_errno()) {
  print_r("Failed to connect to MYSQL: ". mysqli_connect_error());
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = $con->query("SELECT * FROM admin_accounts WHERE uname = '$username' AND pword = '$password'");

if ($sql) {
  $row = $sql->fetch_assoc();
  $_SESSION["user"] = $row['uname'];
  $_SESSION["office"] = $row['office'];
  echo json_encode(array("select" => "success"));
}else{
  echo json_encode(array("select" => "failed"));
}
?>
