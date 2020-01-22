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
              <h1>Schedule</h1>
            </div>
          </div>

          <div class="flex-column applicant">
              <div class="">
                <table>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>First Course Preference</th>
                      <th>Second Course Preference</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="applicants-tbl">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "lnu-online-application";
                    $con = mysqli_connect($servername,$username,$password,$dbname);

                    $sql = $con->query("SELECT * FROM applicant_tbl WHERE applicationStatus = 0");

                    while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <tr>
                          <td><?= $row["fname"]." ".$row["mname"]." ".$row["lname"] ?></td>
                          <td><?= $row["firstCoursePreference"] ?></td>
                          <td><?= $row["secondCoursePreference"] ?></td>
                          <td>
                          <?php

                            if ($row["applicationStatus"] == 0) {
                              echo "New Applicant";
                            }

                          ?></td>
                          <td> <button type="button" name="button">Accept</button>  <button type="button" name="button">Reject</button> <button type="button" name="button">View</button> </td>
                        </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
          </div>

          <div class="flex-column enrolled" style="display:none">
            <div class="">
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>First Course Preference</th>
                    <th>Second Course Preference</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $servername1 = "localhost";
                  $username1 = "root";
                  $password1 = "";
                  $dbname1 = "lnu-online-application";
                  $con1 = mysqli_connect($servername1,$username1,$password1,$dbname1);
                    $sql1 = $con->query("SELECT * FROM applicant_tbl WHERE applicationStatus = 1");
                    while ($row1 = mysqli_fetch_array($sql1)) {
                      ?>
                        <tr>
                          <td><?= $row1["fname"]." ".$row1["mname"]." ".$row1["lname"] ?></td>
                          <td><?= $row1["firstCoursePreference"] ?></td>
                          <td><?= $row1["secondCoursePreference"] ?></td>
                          <td>
                          <?php

                            if ($row1["applicationStatus"] == 0) {
                              echo "New Applicant";
                            }

                          ?></td>
                          <td><button type="button" name="button">View</button> </td>
                        </tr>
                      <?php
                    }
                    ?>

                </tbody>
              </table>
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
