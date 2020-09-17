<?php
session_start();
date_default_timezone_set('Asia/Taipei');
require '../con_f/db/db.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/logo.png" type="image/gif">
    <title>LNU Online Application</title>
    <link rel="stylesheet" type="text/css" href="../con_f/styles/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../con_f/styles/css/styles.css">
    <link rel="stylesheet" href="../con_f/styles/css/print.min.css">

  </head>
  <body>

    <?php
      if (isset($_SESSION['user'])) {

        if ($_SESSION['office'] == 1 || $_SESSION['office'] == "1") {
      
          $date = date("Y-m-d");
          $query = $con->query("UPDATE application_period SET status = '0' WHERE dateEnd <= '$date'");
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

              <div class="sidebar-forExam">
                <a href="#" id="link-forExam">For Exam</a>
              </div>

              <div class="sidebar-forInterview">
                <a href="#" id="link-forInterview">For Interview</a>
              </div>

              <div class="sidebar-forQualified">
                <a href="#" id="link-forQualified">Qualified</a>
              </div>

              <div class="sidebar-userManagement">
                <a href="#" id="link-userManagement">User Management</a>
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



            <div class="flex-column applicant" >
                  <div class="">
                      <?php include 'list-applicants.php'; ?>
                  </div>
            </div>

            <div class="flex-column view-applicant" style="display:none" >
              <div class="">
                <?php include 'printable.php' ?>
              </div>
            </div>

            <div class="flex-column forExam" style="display:none">
              <div class="">
                <?php include 'list-approvedApplicants.php'; ?>
              </div>
            </div>

            <div class="flex-column forInterview" style="display:none">
              <div class="">
                <?php include 'list-forInterview.php'; ?>
              </div>
            </div>

            <div class="flex-column forQualified" style="display:none">
              <div class="">
                <?php include 'list-qualified.php'; ?>
              </div>
            </div>

            <div class="flex-column userManagement" style="display:none">
              <div class="">
                <?php include 'userManagement.php'; ?>
              </div>
            </div>
          </div>

          <?php
        }else{
          require "interviewer.php";
        }


      }else{
        require "login.php";
      }

    ?>
    <script type="text/javascript" charset="utf8" src="../con_f/js/jquery.dataTables.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../con_f/js/jquery.min.js"></script>
    <script src="../con_f/js/jquery-ui.min.js"></script>
    <script src="../con_f/js/print.min.js"></script>
    <script src="../con_f/js/request.js"></script>
  </body>
</html>
