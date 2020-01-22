<table>
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
    $sql = $con->query("SELECT * FROM applicant_tbl INNER JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 0 AND application_period.dateStart <= '$date' AND application_period.dateEnd > '$date'");

    while ($row = mysqli_fetch_array($sql)) {
      ?>
        <tr>
          <td><?= $row["fname"]." ".$row["mname"]." ".$row["lname"] ?></td>
          <td><?= $row["firstCoursePreference"] ?></td>
          <td><?= $row["secondCoursePreference"] ?></td>
          <td> <button type="button" name="button">Accept</button>  <button type="button" name="button">Reject</button> <button type="button" name="button">View</button> </td>
        </tr>
      <?php
    }
    ?>
  </tbody>
</table>
