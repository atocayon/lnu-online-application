<html lang="en">
<head>
    <link rel="icon" href="img/logo.png" type="image/gif">
    <title>LNU Online Application</title>
    <link rel="stylesheet" type="text/css" href="con_f/styles/css/styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="request.js"></script>
</head>
<body>
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


<script>
 var year = new Date().getFullYear();
 var month = new Date().getMonth() + 1;
 var day = new Date().getDate();
 var hours = new Date().getHours();
 var minutes = new Date().getMinutes();
 var seconds = new Date().getSeconds();
 var milliseconds = new Date().getMilliseconds();

 var applicant_id = year+""+month+""+day+""+hours+""+minutes+""+seconds+""+milliseconds;

 console.log();
</script>
</body>
</html>
