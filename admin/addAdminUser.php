<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);
session_start();



$uname = $_POST['uname'];
$pword = $_POST['pword'];
$role = $_POST['role'];
$office = $_POST['office'];

$check = $con->query("SELECT * FROM admin_accounts WHERE uname = '$uname' AND pword = '$pword' AND role = '$role'");
if (mysqli_num_rows($check) > 0) {
  echo json_encode(array("insert" => "dupplicate"));
}else{
  $query = $con->query("INSERT INTO admin_accounts (uname, pword, role, office) VALUES('$uname', '$pword', '$role', '$office')");
  if ($query) {
    echo json_encode(array("insert" => "success"));
  }else{
    echo mysqli_error($con);
  }
}


?>
