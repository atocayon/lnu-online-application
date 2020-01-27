<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lnu-online-application";
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  print_r("Failed to connect to MYSQL: ". mysqli_connect_error());
}
$date = date("Y-m-d");
$year = date("Y");
$query = $con->query("SELECT count(id) as count, id FROM application_period WHERE status = '1'");
$result = $query->fetch_assoc();
$count = $result['count'];
if ($count !== '0') {
  ?>
  <!--Forms Button-->
  <div  class="flex-row justify-center forms-options">
      <input type="text" value="<?= $result['id'] ?>" id="application_period" hidden>
      <div>
          <a href="#" id="prog-application"><span class="step-1">1</span><br><span id="step-1-text">Status of Application</span></a>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <div class="step-1-circle" ></div>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <a href="#" id="prog-personal"><span class="step-2">2</span><br><span id="step-2-text">Personal Information</span></a>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <div class="step-2-circle"></div>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <a href="#" id="prog-schoolRecords"><span class="step-3">3</span><br><span id="step-3-text">School Records</span></a>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <div class="step-3-circle"></div>
      </div>
      <div>
          <div class="border-line">
          </div>
      </div>
      <div>
          <a href="#" id="prog-charRefer"><span class="step-4">4</span><br><span id="step-4-text">Character References</span></a>
      </div>
  </div>
  <!--End Forms Button-->

  <!--Form 1-->
  <div class="form-1">
      <div class="form-1-title">
          <div>
              <h2>Status of Application</h2>
          </div>
      </div>
      <div  class="flex-row form-container" style="margin-top: 50px">
          <div>
              <div  class="flex-row">
                  <div>
                      <label>
                          <input type="radio" name="status" class="check-box" id="checkbox-new" value="new-applicant">
                      </label>
                  </div>
                  <div>
                      <h3>
                          New
                      </h3>
                  </div>
              </div>
          </div>
          <div>
              <div  class="flex-row">
                  <div>
                      <label>
                          <input type="radio" name="status"  class="check-box" id="checkbox-transferee" value="transferee-applicant">
                      </label>
                  </div>
                  <div>
                      <h3>
                          Transferee
                      </h3>
                  </div>
              </div>
          </div>
          <div>
              <div  class="flex-row">
                  <div>
                      <label>
                          <input type="radio" name="status"  class="check-box" id="checkbox-returnee" value="returnee-applicant">
                      </label>
                  </div>
                  <div>
                      <h3>
                          Returnee
                      </h3>
                  </div>
              </div>
          </div>
      </div>

      <div class="form-container">
          <div id="returnee">
              <div class="flex-row" >
                  <div>
                      When did you apply?&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <div>
                      <label>Month:</label>&nbsp;&nbsp;
                      <label>
                          <input type="text" class="form-input" placeholder="Ex. January" name="returnee-month" id="returnee-month" value="undefined">
                      </label>&nbsp;&nbsp;
                  </div>
                  <div>
                      <label>Year</label>&nbsp;&nbsp;
                      <label>
                          <input type="text" class="form-input" placeholder="Ex. 2017" name="returnee-year" id="returnee-year" value="undefined">
                      </label>
                  </div>
              </div>
              <br>
              <div class="flex-row">
                  <div>
                      Passer:&nbsp;&nbsp;
                  </div>
                  <div>
                      <label>
                          <input type="radio" class="yes-no" name="passer-radio" id="pass-no" value="no">
                      </label>
                      <label>No</label>&nbsp;&nbsp;
                  </div>
                  <div>
                      <label>
                          <input type="radio"  class="yes-no" name="passer-radio" id="pass-yes" value="yes">
                      </label>
                      <label>Yes</label>&nbsp;&nbsp;
                  </div>
                  <div>
                      , specify the course
                      <label>
                          <select class="form-input" name="returnee-specify-course" id="returnee-specify-course">
                              <option value="undefined">Select Course</option>
                              <option value="bsit">Bachelor of Sciences in Information Technology</option>
                              <option value="bssw">Bachelor of Science in Social Work</option>
                              <option value="bael">Bachelor of Arts in English Language</option>
                              <option value="baps">Bachelor of Arts in Political Science</option>
                              <option value="bssw">Bachelor of Science in Social Work</option>
                              <option value="blis">blis</option>
                              <option value="bsbio">Bachelor of Sciences in Biology</option>
                              <option value="bsmath">Bachelor of Science in Mathematics</option>
                              <option value="bsthrm">bsthrm</option>
                              <option value="bshae">bshae</option>
                              <option value="bshrm">bshrm</option>
                              <option value="beed">Bachelor of Elementary Education</option>
                              <option value="bsed">Bachelor of Secondary Education</option>
                              <option value="bacom">Bachelor of Arts in Communication</option>
                          </select>
                      </label>
                  </div>
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  <b>
                      1st Course Preference:<br>
                  </b>

                  <label>
                      <select class="form-input" name="first-course-preference" id="first-course-preference">
                          <option value="">Select Course</option>
                          <option value="bsit">Bachelor of Sciences in Information Technology</option>
                          <option value="bssw">Bachelor of Science in Social Work</option>
                          <option value="bael">Bachelor of Arts in English Language</option>
                          <option value="baps">Bachelor of Arts in Political Science</option>
                          <option value="bssw">Bachelor of Science in Social Work</option>
                          <option value="blis">blis</option>
                          <option value="bsbio">Bachelor of Sciences in Biology</option>
                          <option value="bsmath">Bachelor of Science in Mathematics</option>
                          <option value="bsthrm">bsthrm</option>
                          <option value="bshae">bshae</option>
                          <option value="bshrm">bshrm</option>
                          <option value="beed">Bachelor of Elementary Education</option>
                          <option value="bsed">Bachelor of Secondary Education</option>
                          <option  value="bacom">Bachelor of Arts in Communication</option>
                      </select>
                  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <b>
                      2nd Course Preference:<br>
                  </b>
                  <label>
                      <select class="form-input" name="second-course-preference" id="second-course-preference">
                          <option value="">Select Course</option>
                          <option value="bsit">Bachelor of Sciences in Information Technology</option>
                          <option value="bssw">Bachelor of Science in Social Work</option>
                          <option value="bael">Bachelor of Arts in English Language</option>
                          <option value="baps">Bachelor of Arts in Political Science</option>
                          <option value="bssw">Bachelor of Science in Social Work</option>
                          <option value="blis">blis</option>
                          <option value="bsbio">Bachelor of Sciences in Biology</option>
                          <option value="bsmath">Bachelor of Science in Mathematics</option>
                          <option value="bsthrm">bsthrm</option>
                          <option value="bshae">bshae</option>
                          <option value="bshrm">bshrm</option>
                          <option value="beed">Bachelor of Elementary Education</option>
                          <option value="bsed">Bachelor of Secondary Education</option>
                          <option value="bacom">Bachelor of Arts in Communication</option>
                      </select>
                  </label>
              </div>
          </div>

          <div class="flex-row right btn-container">
            <div class="">
              <button type="button" name="button" class="btn-form" id="btn-next-to-second-step">Next</button>
            </div>
          </div>

      </div>
  </div>
  <!--End of Form 1-->


  <!--Form 2-->
  <div class="form-2">
      <div class="form-2-title">
          <div>
              <h2>Personal Information</h2>
          </div>
      </div>
      <br>
      <div class="form-container">
          Name of Applicant:
          <div class="flex-row">
              <div>
                  <label>
                      <input type="text" placeholder="Your Last Name" class="form-input" name="lname" id="lname">
                  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <input type="text" placeholder="Your First Name" class="form-input" name="fname" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <input type="text" placeholder="Your Middle Name" class="form-input" name="mname" id="mname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  Date of Birth:&nbsp;&nbsp;
                  <input type="date" class="form-input" name="bdate" id="bdate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Age:&nbsp;&nbsp;
                  <input type="number" placeholder="Your age" class="form-input" name="age" id="age">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Sex:&nbsp;&nbsp;
                  <select class="form-input" name="sex" id="sex">
                      <option value="">Select Sex</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Status:&nbsp;&nbsp;
                  <select class="form-input" name="status" id="status">
                      <option value="">Select Status</option>
                      <option value="single">Single</option>
                      <option value="married">Married</option>
                      <option value="widow">Widow</option>
                      <option value="legally_separated">Legally Separated</option>
                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Citizenship:&nbsp;&nbsp;
                  <input type="text" placeholder="Ex. Filipino" class="form-input" name="citizenship" id="citizenship">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
          </div>
      <br>
          <div class="flex-row">
              <div>
                  Complete Home Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <input type="text" placeholder="Your Complete Address" class="form-input" name="complete-homeAddress" id="complete-homeAddress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
          </div>
      <br>
          <div class="flex-row">
              <div>
                  Complete City Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <input type="text" placeholder="Your Complete City Address" class="form-input" name="complete-cityAddress" id="complete-cityAddress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  Telephone No. :&nbsp;&nbsp;
                  <input type="text" placeholder="Telephone Number" class="form-input" name="tel-no" id="tel-no">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Mobile No.: &nbsp;&nbsp;
                  <input type="text" placeholder="Mobile Number" class="form-input" name="mobile-no" id="mobile-no">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  E-mail Address: &nbsp;&nbsp;
                  <input type="text" placeholder="email@address.com" class="form-input" name="email-add" id="email-adds">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
          </div>

      <br>
          <div class="flex-row">
              <div>
                  Name of Parent/Guardian:&nbsp;&nbsp;
                  <input type="text" placeholder="Full Name" class="form-input" name="parent-guardian" id="parent-guardian">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  Occupation:&nbsp;&nbsp;
                  <input type="text" placeholder="Occupation" class="form-input" name="occupation" id="occupation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>

              <div>
                  Contact No. :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" placeholder="Mobile number" class="form-input" name="contact-no" id="contact-no">
              </div>
          </div>

      </div>

      <div class="flex-row right btn-container">
        <div class="">
          <button type="button" name="button" class="btn-form" id="btn-prev-to-first-step">Previous</button>
        </div>
        <div class="">
          <button type="button" name="button" class="btn-form" id="btn-next-to-third-step">Next</button>
        </div>

      </div>


  </div>
  <!--End of Form 2-->


  <!--Form 3-->
  <div class="form-3">
      <div class="form-3-title">
          <div>
              <h2>School Records</h2>
          </div>
      </div>
      <br>
      <div class="form-container">
          <div class="flex-row">
              <div>
                  Type of School Last Attended:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="radio" name="type-of-school" value="public" id="publicSchool-checkbox">
                  </label>
                  <label>Public</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="radio" name="type-of-school" value="private" id="privateSchool-checkbox">
                  </label>
                  <label>Private</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="radio" name="school-category" value="religious" id="religious-school">
                  </label>
                  <label>Religious</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="radio" name="school-category" value="non-religious" id="non-religious-school">
                  </label>
                  <label>
                      Non-Religious
                  </label>
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  <table>
                      <thead>
                      <tr>
                          <th>
                              Name of Schools Attended
                          </th>
                          <th>
                              Address
                          </th>
                          <th>
                              Level (Elem, High School, Vocational, etc.)
                          </th>
                          <th>
                              Inclusive Date
                          </th>
                          <th>
                              Honors and Awards Received
                          </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                              <label>
                                  <input type="text" class="form-input-tbl" name="first-school-name" id="first-school-name">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-school-address" id="first-school-address">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-school-level" id="first-school-level">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="date"  class="form-input-tbl" name="first-school-inclusiveDate" id="first-school-inclusiveDate">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-school-award-received" id="first-school-award-received">
                              </label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-school-name" id="second-school-name">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-school-address" id="second-school-address">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-school-level" id="second-school-level">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="date"  class="form-input-tbl" name="second-school-inclusiveDate" id="second-school-inclusiveDate">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-school-award-received" id="second-school-award-received">
                              </label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="third-school-name" id="third-school-name">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="third-school-address" id="third-school-address">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="third-school-level" id="third-school-level">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="date"  class="form-input-tbl" name="third-school-inclusiveDate" id="third-school-inclusiveDate">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="third-school-award-received" id="third-school-award-received">
                              </label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="fourth-school-name" id="fourth-school-name">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="fourth-school-address" id="fourth-school-address">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="fourth-school-level" id="fourth-school-level">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="date"  class="form-input-tbl" name="fourth-school-inclusiveDate" id="fourth-school-inclusiveDate">
                              </label>
                          </td>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="fourth-school-award-received" id="fourth-school-award-received">
                              </label>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  General Weighted Average:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="text" class="form-input" name="general-weighted-average" id="general-weighted-average">
                  </label>
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  Membership/s in Organization:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="text" class="form-input" name="membership-organization" id="membership-organization">
                  </label>
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  Hobbies, Talents & Interests:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div>
                  <label>
                      <input type="text" class="form-input" name="hobbies-talents-interests" id="hobbies-talents-interests">
                  </label>
              </div>
          </div>
          <div style="height: 50px;"></div>
      </div>

      <div class="flex-row right btn-container">
        <div class="">
          <button type="button" name="button" class="btn-form" id="btn-prev-to-second-step" >Previous</button>
        </div>
        <div class="">
          <button type="button" name="button" class="btn-form" id="btn-next-to-fourth-step">Next</button>
        </div>

      </div>
  </div>
  <!--End of Form 3-->


  <!--Form 4-->
  <div class="form-4">
      <div class="form-4-title">
          <div>
              <h2>School Records</h2>
          </div>
      </div>
      <br>
      <div class="form-container">
          <div class="flex-row">
              <div>
                  Write Down at least 2 names and addressed of persons as character references (Teacher/Adviser, Guidance Counselor, Barangay Officials, Priest/Pastor).
              </div>
          </div>
          <br>
          <div class="flex-row">
              <div>
                  <table>
                      <thead>
                      <tr>
                          <th>
                              Name
                          </th>
                          <th>
                              Address
                          </th>
                          <th>
                              Contact Number
                          </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-person-reference-name" id="first-person-reference-name">
                              </label>
                          </td>

                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-person-reference-address" id="first-person-reference-address">
                              </label>
                          </td>

                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="first-person-reference-cnum" id="first-person-reference-cnum">
                              </label>
                          </td>
                      </tr>

                      <tr>
                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-person-reference-name" id="second-person-reference-name">
                              </label>
                          </td>

                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-person-reference-address" id="second-person-reference-address">
                              </label>
                          </td>

                          <td>
                              <label>
                                  <input type="text"  class="form-input-tbl" name="second-person-reference-cnum" id="second-person-reference-cnum">
                              </label>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      <br>
          <div class="flex-row" style="margin-right: 100px">
              <div>
                  I understand  that my application for admission is subject for approval of the Admission Committee
                  of the University. I certify that the information given is true and correct. Falsifying any of the
                  information is sufficient ground for any legal action and rejection relative to my application. In
                  addition, I understand that the LNU has no obligation to provide me with reasons in case this application
                  will be denied.
              </div>
          </div>

          <br>
          <br>
          <div class="flex-row right">
              <div>
                <button type="button" name="button" class="btn-form" id="btn-submit">Submit</button>
              </div>
          </div>
      </div>
  </div>
  <!--End of Form 4-->

  <!-- <div class="flex-row justify-center">
    <div class="file_upload">
      <input type="file" name="files[]" id="multiFiles" multiple="multiple">
    </div>
  </div> -->
  <?php
}else{
  ?>
    <h1 style="text-align: center;margin-top: 20vh;font-weight: bold;color: ">Application Period Not Started</h1>
  <?php
}

?>
