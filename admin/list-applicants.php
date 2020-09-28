
<?php 
 require '../con_f/db/db.php';
?>
<table id="table_id">
  <thead>
    <tr>
      <th>Name</th>
      <th>First Course Preference</th>
      <th>Second Course Preference</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="applicants-tbl">
    <?php
    $date = date("Y-m-d");
    $sql = $con->query("SELECT * FROM applicant_tbl LEFT JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 1 AND application_period.status = 1");

    while ($row = mysqli_fetch_array($sql)) {
      ?>
        <tr>
          <td><?= $row["fname"]." ".$row["mname"]." ".$row["lname"] ?></td>
          <td>
              <?php $sql1 = $con->query("SELECT * FROM office WHERE id= '".$row["firstCoursePreference"]."'");
                $row_sql1 = $sql1 -> fetch_assoc();
                echo $row_sql1["course"];
              ?></td>
          <td>
             <?php $sql2 = $con->query("SELECT * FROM office WHERE id= '".$row["secondCoursePreference"]."'");
                $row_sql2 = $sql2 -> fetch_assoc();
                echo $row_sql2["course"];
              ?>
           </td>
          <td>
            <?php $data = array('id' => $row['applicantID'], 'email' => $row['emailAdd']); ?>

            <a href="acceptApplicant.php?<?= http_build_query($data) ?>" onclick="return confirm('Are you sure?')" id="btn-acceptApplicant">Accept</a>
            <a href="rejectApplicant.php?<?= http_build_query($data) ?>" onclick="return confirm('Are you sure you? This action cannot be undone...')" id="btn-rejectApplicant">Reject</a>
            <button class="btn-viewApplicant" value="<?= $row['applicantID'] ?>">View</button> </td>
        </tr>
      <?php
    }
    ?>
  </tbody>
</table>
