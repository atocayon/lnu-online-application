<div class="">
  <table id="tbl-qualifiedApplicant">
    <thead>
      <tr>
        <th>Name</th>
        <th>1st Course Preference</th>
        <th>2nd Course Preference</th>
        <th>Interview Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query_select = $con->query("SELECT *
        FROM
        applicant_tbl
        WHERE (applicationStatus = 5) AND (firstCoursePreference = '$office' OR secondCoursePreference = '$office') ");

        if ($query_select) {
          while ($row = mysqli_fetch_array($query_select)) {
            ?>
            <td><?= $row['fname']." ".$row['mname']." ".$row['lname'] ?></td>
            <td><?php
              $firstCourse = $row['firstCoursePreference'];
              $query_firstCourse = $con->query("SELECT * FROM office WHERE id = '$firstCourse'");
              $res_firstCourse = $query_firstCourse->fetch_assoc();
              echo $res_firstCourse['course'];
            ?></td>
            <td>
              <?php
                $secondCourse = $row['secondCoursePreference'];
                $query_secondCourse = $con->query("SELECT * FROM office WHERE id = '$secondCourse'");
                $res_secondCourse = $query_secondCourse->fetch_assoc();
                echo $res_secondCourse['course'];
              ?>
            </td>
            <td>
              <?php
               $date = date('Y-m-d');
               $applicant_id = $row['applicantID'];
               $select_interviewDate = $con->query("SELECT * FROM interview_period WHERE applicantID = '$applicant_id'");
               $res_selectInterviewDate = $select_interviewDate->fetch_assoc();
               if ($res_selectInterviewDate['interview_date'] < $date) {
                 echo "<span style='color:red'>".$res_selectInterviewDate['interview_date']."</span>";
               }else{
                 echo "<span>".$res_selectInterviewDate['interview_date']."</span>";
               }
               ?>
            </td>
            <td>
              <button type="button" class="btn-viewApplicantQualifiedInterview viewApplicantInterviewee" value="<?= $row['applicantID'] ?>" id="<?= $row['applicantID'] ?>_viewQualifiedApplicantInterviewee">View</button>
            </td>

            <?php
          }
        }

      ?>
    </tbody>
  </table>
</div>
