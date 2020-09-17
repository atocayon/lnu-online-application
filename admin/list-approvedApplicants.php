<?php 
 require '../con_f/db/db.php';
?>
<table id="tbl_approvedApplicants">
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
      $sql = $con->query("SELECT * FROM applicant_tbl LEFT JOIN application_period ON applicant_tbl.applicationPeriod = application_period.id WHERE applicant_tbl.applicationStatus = 2 AND application_period.status = 1");
      if ($sql) {
        while ($row = mysqli_fetch_array($sql)) {
          ?>
            <tr>
              <td><?= $row["fname"]." ".$row["mname"]." ".$row["lname"] ?></td>

              <td><?= $row["firstCoursePreference"] ?></td>
              <td><?= $row["secondCoursePreference"] ?></td>
              <td>
                <button type="button" class="btn-viewApplicantForExam" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnViewApplicant">View</button>
                <button type="button" name="button" class="btn-evaluateApplicantForExam" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnEvaluate" >Evaluate</button>
                <input type="number" placeholder="ART" id="<?= $row['applicantID'] ?>_art" class="input_grades_exam"  hidden>
                <input type="number" placeholder="SCI" id="<?= $row['applicantID'] ?>_sci" class="input_grades_exam" hidden>
                <input type="number" placeholder="NAT" id="<?= $row['applicantID'] ?>_nat" class="input_grades_exam" hidden>
                <input type="number" placeholder="PRO" id="<?= $row['applicantID'] ?>_pro" class="input_grades_exam" hidden>
                <input type="number" placeholder="MEC" id="<?= $row['applicantID'] ?>_mec" class="input_grades_exam" hidden>
                <input type="number" placeholder="IND" id="<?= $row['applicantID'] ?>_ind" class="input_grades_exam" hidden>
                <input type="number" placeholder="BUS" id="<?= $row['applicantID'] ?>_bus" class="input_grades_exam" hidden>
                <input type="number" placeholder="SEL" id="<?= $row['applicantID'] ?>_sel" class="input_grades_exam" hidden>
                <input type="number" placeholder="ACC" id="<?= $row['applicantID'] ?>_acc" class="input_grades_exam" hidden>
                <input type="number" placeholder="HUM" id="<?= $row['applicantID'] ?>_hum" class="input_grades_exam" hidden>
                <input type="number" placeholder="LEA" id="<?= $row['applicantID'] ?>_lea" class="input_grades_exam" hidden>
                <input type="number" placeholder="PHY" id="<?= $row['applicantID'] ?>_phy" class="input_grades_exam" hidden>
                <button type="button" name="button" class="submitExamResult" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnSubmitEvaluate" style="display:none">submit</button>
                <button type="button" name="button" class="cancelExamEvaluation" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnCancelEvaluate" style="display:none">cancel</button>
              </td>
            </tr>
          <?php
        }
      }else{
        echo mysqli_error($con);
      }

      ?>

  </tbody>
</table>
