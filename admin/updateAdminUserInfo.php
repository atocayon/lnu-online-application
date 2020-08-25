<?php
 require '../con_f/db/db.php';
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
