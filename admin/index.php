<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/logo.png" type="image/gif">
    <title>LNU Online Application</title>
    <link rel="stylesheet" type="text/css" href="../con_f/styles/css/styles.css">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
  </head>
  <body>

    <?php
      if (isset($_SESSION['user'])) {
        ?>

        <!--Header-->
        <?php require "header.php"; ?>

        <!--Navbar-->
        <?php require "navbar.php"; ?>
        <!--End Navbar-->

        <div class="flex-row">

          <div class="flex-column sidebar">
            <div class="sidebar-schedule">
              <a href="#" id="link-schedule">Set Application Schedule</a>
            </div>

            <div class="sidebar-applicant">
              <a href="#" id="link-applicants">Applicants</a>

            </div>

            <div class="sidebar-enrolled">
              <a href="#" id="link-enrolled">Approved</a>
            </div>

            <div class="sidebar-logout">
              <a href="admin-logout.php" id="link-logout">Logout, <?= $_SESSION['user'] ?></a>
            </div>
          </div>

          <div class="flex-column schedule" style="display:none">
            <div class="">
              <?php include 'setSchedule.php'; ?>
            </div>
          </div>

          <div class="flex-column applicant">
              <div class="">
                <?php include 'list-applicants.php'; ?>
              </div>
          </div>

          <div class="flex-column enrolled" style="display:none">
            <div class="">
              <?php include 'list-approvedApplicants.php'; ?>
            </div>
          </div>

        </div>

        <?php
      }else{
        require "login.php";
      }

    ?>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="../request.js"></script>
  </body>
</html>
