<?php 
 require '../con_f/db/db.php';
?>

<table id="tbl_forInterview">
  <thead>
    <tr>
      <th>Name</th>
      <th>First Course Preference</th>
      <th>Second Course Preference</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $date = date("Y-m-d");
      $sql1 = $con->query("SELECT * FROM applicant_tbl LEFT JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 3 AND application_period.status = 1");
      while ($row1 = mysqli_fetch_array($sql1)) {
        ?>
          <tr>
            <td><?= $row1["fname"]." ".$row1["mname"]." ".$row1["lname"] ?></td>
            <td><?= $row1["firstCoursePreference"] ?></td>
            <td><?= $row1["secondCoursePreference"] ?></td>
            <td><button type="button" name="button"  class="btn-viewForInterviewApplicant">View</button></td>
          </tr>
        <?php
      }
      ?>

  </tbody>
</table>
