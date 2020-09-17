<?php
 require '../con_f/db/db.php';
date_default_timezone_set('Asia/Taipei');
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
        require "header.php";
        require "navbar_interviewer.php";
       

         
         $date = date("Y-m-d");
         $query = $con->query("UPDATE application_period SET status = '0' WHERE dateEnd <= '$date'");
         $check = $con->query("SELECT count(id) as count, id FROM application_period WHERE status = '1'");
         $result_check = $check->fetch_assoc();
         $count = $result_check['count'];
         $office = $_SESSION["office"];

         if ($count !== '0') {
           ?>

           <div class="interviewer-container">
             <table id="tbl-interviewer">
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
                   $query_select_applicant_forInterview = $con->query("SELECT *
                     FROM
                     applicant_tbl
                     WHERE (applicationStatus = 3) AND (firstCoursePreference = '$office' OR secondCoursePreference = '$office') ");


                       while($resApplicantForInterview = mysqli_fetch_array( $query_select_applicant_forInterview)){
                         ?>
                           <td><?= $resApplicantForInterview['fname']." ".$resApplicantForInterview['mname']." ".$resApplicantForInterview['lname'] ?></td>
                           <td><?php
                             $firstCourse = $resApplicantForInterview['firstCoursePreference'];
                             $query_firstCourse = $con->query("SELECT * FROM office WHERE id = '$firstCourse'");
                             $res_firstCourse = $query_firstCourse->fetch_assoc();
                             echo $res_firstCourse['course'];
                           ?></td>
                           <td>
                             <?php
                               $secondCourse = $resApplicantForInterview['secondCoursePreference'];
                               $query_secondCourse = $con->query("SELECT * FROM office WHERE id = '$secondCourse'");
                               $res_secondCourse = $query_secondCourse->fetch_assoc();
                               echo $res_secondCourse['course'];
                             ?>
                           </td>
                           <td>
                             <?php
                              $date = date('Y-m-d');
                              $applicant_id = $resApplicantForInterview['applicantID'];
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
                             <input type="text" class="input_interview" id="<?= $resApplicantForInterview['applicantID'] ?>_grammar" title="Grammar" style="display:none;">
                             <input type="text" class="input_interview" id="<?= $resApplicantForInterview['applicantID'] ?>_clarity" title="Clarity" style="display:none;">
                             <input type="text" class="input_interview" id="<?= $resApplicantForInterview['applicantID'] ?>_fluency" title="Fluency" style="display:none;">
                             <input type="text" class="input_interview" id="<?= $resApplicantForInterview['applicantID'] ?>_development_deliveryOfInfo" title="Development Delivery of Info" style="display:none;">
                             <input type="text" class="input_interview" id="<?= $resApplicantForInterview['applicantID'] ?>_interest" title="Interest" style="display:none;">
                             <button type="button" name="button" value="<?= $resApplicantForInterview['applicantID'] ?>" id="<?= $resApplicantForInterview['applicantID'] ?>_viewApplicantInterviewee" class="viewApplicantInterviewee">view</button>
                             <button type="button" name="button" value="<?= $resApplicantForInterview['applicantID'] ?>" id="<?= $resApplicantForInterview['applicantID'] ?>_evalutateApplicantInterviewee" class="evauluateApplicantInterviewee">evaluate</button>
                             <button type="button" name="button" value="<?= $resApplicantForInterview['applicantID'] ?>" id="<?= $resApplicantForInterview['applicantID'] ?>_saveApplicantInterviewee" class="saveApplicantInterviewee" style="display:none;">save</button>
                             <button type="button" name="button" value="<?= $resApplicantForInterview['applicantID'] ?>" id="<?= $resApplicantForInterview['applicantID'] ?>_cancelApplicantInterviewee" class="cancelApplicantInterviewee" style="display:none;">cancel</button>
                           </td>
                         <?php
                       }


                  ?>
               </tbody>
             </table>
           </div>

           <div class="flex-column view-applicant" style="display:none" >
             <div class="printable-interviewee">
               <?php include 'printable.php' ?>
             </div>
           </div>


           <div class="flex-column view-doneInterview" style="display:none">
             <div class="done-interviewee">
               <?php include 'doneInterview.php' ?>
             </div>
           </div>

           <div class="flex-column view-qualified" style="display: none">
                 <div class="qualified-applicant">
                   <?php include "qualified.php" ?>
               </div>
           </div>
           <?php
         }else{
           ?>
             <h1 style="text-align: center;margin-top: 20vh;font-weight: bold;color: ">Application Period Not Started</h1>
           <?php
         }

      }

    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script src="../request.js"></script>
  </body>
</html>
