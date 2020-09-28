<?php 
 require '../con_f/db/db.php';
?>
<table id="tbl_qualified">
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
      $sql1 = $con->query("SELECT * FROM applicant_tbl LEFT JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 5 AND application_period.status = 1");
      while ($row1 = mysqli_fetch_array($sql1)) {
        ?>
          <tr>
            <td><?= $row1["fname"]." ".$row1["mname"]." ".$row1["lname"] ?></td>
            <td>
                 <?php $sql2 = $con->query("SELECT * FROM office WHERE id= '".$row1["firstCoursePreference"]."'");
                $row_sql2 = $sql2 -> fetch_assoc();
                echo $row_sql2["course"];
              ?>
               </td>
            <td>
                 <?php $sql3 = $con->query("SELECT * FROM office WHERE id= '".$row1["secondCoursePreference"]."'");
                $row_sql3 = $sql3 -> fetch_assoc();
                echo $row_sql3["course"];
              ?>
                </td>
            <td><button type="button" name="button">View</button> </td>
          </tr>
        <?php
      }
      ?>

  </tbody>
</table>
