
<html lang="en">
<head>
  <meta charset="utf-8">
    <link rel="icon" href="img/logo.png" type="image/gif">
    <title>LNU Online Application</title>
    <link rel="stylesheet" type="text/css" href="con_f/styles/css/styles.css">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "lnu-online-application";
  $con = mysqli_connect($servername,$username,$password,$dbname);
  $date = date("Y-m-d");
  $query = $con->query("UPDATE application_period SET status = '0' WHERE dateEnd <= '$date'");

   ?>
<!--Header-->
<?php require "header.php"; ?>

<!--End of Header-->

<!--Navbar-->
<?php require "navbar.php"; ?>
<!--End Navbar-->

<div class="form_application">
  <!-- Forms -->
  <?php require "form.php"; ?>
  <!-- End of Forms -->
</div>

<div class="main-page">
  <?php require "main.php"; ?>
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="request.js"></script>
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
