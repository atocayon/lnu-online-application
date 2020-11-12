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

              <td>
               <?php $sql1 = $con->query("SELECT * FROM office WHERE id= '".$row["firstCoursePreference"]."'");
                $row_sql1 = $sql1 -> fetch_assoc();
                echo $row_sql1["course"];
              ?>
              </td>
              <td>
                   <?php $sql2 = $con->query("SELECT * FROM office WHERE id= '".$row["secondCoursePreference"]."'");
                $row_sql2 = $sql2 -> fetch_assoc();
                echo $row_sql2["course"];
              ?>
                </td>
              <td>
                <button type="button" class="btn-viewApplicantForExam" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnViewApplicant">View</button>
                <button type="button" name="button" class="btn-evaluateApplicantForExam" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnEvaluate" >Evaluate</button>
                <div>
                <input type="number" placeholder="ART Grade" id="<?= $row['applicantID'] ?>_art" class="input_grades_exam"  hidden>

                </div>
                <div><input type="number" placeholder="SCI Grade" id="<?= $row['applicantID'] ?>_sci" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="NAT Grade" id="<?= $row['applicantID'] ?>_nat" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="PRO Grade" id="<?= $row['applicantID'] ?>_pro" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="MEC Grade" id="<?= $row['applicantID'] ?>_mec" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="IND Grade" id="<?= $row['applicantID'] ?>_ind" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="BUS Grade" id="<?= $row['applicantID'] ?>_bus" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="SEL Grade" id="<?= $row['applicantID'] ?>_sel" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="ACC Grade" id="<?= $row['applicantID'] ?>_acc" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="HUM Grade" id="<?= $row['applicantID'] ?>_hum" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="LEA Grade" id="<?= $row['applicantID'] ?>_lea" class="input_grades_exam" hidden></div>
                <div><input type="number" placeholder="PHY Grade" id="<?= $row['applicantID'] ?>_phy" class="input_grades_exam" hidden></div>
                <div>
                <button type="button" name="button" class="submitExamResult" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnSubmitEvaluate" style="display:none">submit</button>
                <button type="button" name="button" class="cancelExamEvaluation" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_btnCancelEvaluate" style="display:none">cancel</button>
                </div>
                
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
