<?php
date_default_timezone_set('Asia/Taipei');
require './con_f/db/db.php';
?>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link rel="icon" href="img/logo.png" type="image/gif">
    <title>LNU Online Application</title>
    <link rel="stylesheet" type="text/css" href="./con_f/styles/css/jquery.dataTables.css">

    <link rel="stylesheet" type="text/css" href="./con_f/styles/css/styles.css">
    <link rel="stylesheet" href="./con_f/styles/css/print.min.css">

</head>
<body>
  <?php

  $date = date("Y-m-d");
  $query = $con->query("UPDATE application_period SET status = '0' WHERE dateEnd <= '$date'");

   ?>
<!--Header-->
<?php require "header.php"; ?>

<!--End of Header-->

<!--Navbar-->
<?php require "navbar.php"; ?>
<!--End Navbar-->

<div class="main-page">
  <?php require "main.php"; ?>
</div>

<div class="form_application">
  <!-- Forms -->
  <?php require "form.php"; ?>
  <!-- End of Forms -->
</div>



<div class="printable-page">
  <?php require "printable.php"; ?>
</div>

<div class="backdrop-container">
  <?php require "backdrop.php"; ?>
</div>

<div class="modal">
  <?php require "confirmation_modal.php"; ?>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="./con_f/js/jquery.min.js"></script>
<script src="./con_f/js/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="./con_f/js/jquery.dataTables.js"></script>

<script src="./con_f/js/print.min.js"></script>
<script src="./con_f/js/request.js"></script>
<script>
 var year = new Date().getFullYear();
 var month = new Date().getMonth() + 1;
 var day = new Date().getDate();
 var hours = new Date().getHours();
 var minutes = new Date().getMinutes();
 var seconds = new Date().getSeconds();
 var milliseconds = new Date().getMilliseconds();

 var applicant_id = year+""+month+""+day+""+hours+""+minutes+""+seconds+""+milliseconds;

</script>
</body>
</html>
