
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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lnu-online-application";
    $con = mysqli_connect($servername,$username,$password,$dbname);

    $date = date("Y-m-d");
    $sql = $con->query("SELECT * FROM applicant_tbl INNER JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 1 AND application_period.status = 1");

    while ($row = mysqli_fetch_array($sql)) {
      ?>
        <tr>
          <td><?= $row["fname"]." ".$row["mname"]." ".$row["lname"] ?></td>
          <td><?= $row["firstCoursePreference"] ?></td>
          <td><?= $row["secondCoursePreference"] ?></td>
          <td>
            <?php $data = array('id' => $row['applicantID'], 'email' => $row['emailAdd']); ?>
            <input type="text" name="" value="<?= $row['applicantID'] ?>" hidden id="applicantID">
            <a href="acceptApplicant.php?<?= http_build_query($data) ?>" onclick="return confirm('Are you sure?')" id="btn-acceptApplicant">Accept</a>
            <a href="rejectApplicant.php?<?= http_build_query($data) ?>" onclick="return confirm('Are you sure you? This action cannot be undone...')" id="btn-rejectApplicant">Reject</a>
            <a href="#" id="btn-viewApplicant">View</a> </td>
        </tr>
      <?php
    }
    ?>
  </tbody>
</table>
