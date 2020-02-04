

<div class="printable-form-container-admin" id="printable-form-admin">
  <div class="flex-column">
    <div class="flex-row justify-center">
      <div class="">
        <img src="../img/logo.png" alt="logo" class="lnu-logo">
      </div>
      <div class="">
        <h1 style="text-align:center;">LNU COLLEGE SCREENING<br>FOR ADMISSION</h1>
        <br>
        <h1 style="text-align: center;">Application Form</h1>
        <p style="text-align: center;">(Rev. 2015 - 2016)</p>
      </div>
      <div class="flex-row right" >
        <div class="">
          <img src="../img/avatar.jpg" alt="user-avatar" class="user-avatar">
        </div>
      </div>
    </div>

    <div class="flex-row ">
      <div class="status-of-application printable-content">
        <h3>Status of Application</h3>
        <p>(Pls.Check which applies to you)</p>
        <input type="checkbox" name="" value="" id="statusNew"> New
        <br>
        <input type="checkbox" name="" value="" id="statusTransferee"> Transferee
        <br>
        <input type="checkbox" name="" value="" id="statusReturnee"> Returnee
        <br>
        <p>Former Applicant. If yes,<br>
        When did you last apply? Month <u><span id="last_apply_month"></span></u> Year <u><span id="last_apply_year"></span></u>
        </p>
        Passer: <input type="checkbox" name="" value="" id="last_apply_passerNo"> No <input type="checkbox" name="" value="" id="last_apply_passerYes"> Yes, specify the course <u><span id="last_applyCourse"></span></u>
      </div>

      <div class="schoo-year-and-course-preference printable-content">
        <b>School Year:</b><span id="schoolYear"><u></u> </span> <b>Term:</b><span id="term"><u></u> </span><br>
        <b>Course Preference:</b><br>
        <p>(Pls. indicate below)</p>
        1st Course Preference: <u><span id="applicantFirstCoursePreference"></span></u><br>
        2nd Course Preference: <u><span id="applicantSecondCourserPreference"></span></u>
      </div>
    </div>


    <div class="flex-row">
      <div class=" printable-content">
        <h3>Personal Information</h3>
      </div>
    </div>

    <div class="flex-row">
      <div class=" printable-content">
        Name of Applicant: &nbsp;&nbsp;&nbsp;<u><span id="applicantLastName"></span>,&nbsp;&nbsp;&nbsp;<span id="applicantFirstName"></span>&nbsp;&nbsp;&nbsp;<span id="applicantMiddleName"></span></u>
        <br>
        Date of Birth: &nbsp;&nbsp;&nbsp;<u><span id="applicantDateOfBirth"></span></u>&nbsp;&nbsp;&nbsp;Age:&nbsp;&nbsp;&nbsp;<u><span id="applicantAge"></span></u> &nbsp;&nbsp;&nbsp;Gender: &nbsp;&nbsp;&nbsp;<u><span id="applicantGender"></span></u>
        &nbsp;&nbsp;&nbsp;Status:&nbsp;&nbsp;&nbsp;<u><span id="applicantStatus"></span></u>&nbsp;&nbsp;&nbsp;Citizenship:&nbsp;&nbsp;&nbsp;<u><span id="applicantCitizenship"></span></u>
        <br>
        Complete Permanent Home Address:&nbsp;&nbsp;&nbsp;<u><span id="applicantHomeAddress"></span></u>
        <br>
        Complete City Address:&nbsp;&nbsp;&nbsp;<u><span id="applicantCityAddress"></span></u>
        <br>
        Telephone No.: &nbsp;&nbsp;&nbsp;<u><span id="applicantTelNo"></span></u>&nbsp;&nbsp;&nbsp;Mobile/Cell phone No.:&nbsp;&nbsp;&nbsp;<u><span id="applicantMobileNo"></span></u>
        E-mail Address&nbsp;&nbsp;&nbsp;<u><span id="applicantEmail"></span></u>
        <br>
        Name of Parent/Guardian:&nbsp;&nbsp;&nbsp;<u><span id="applicantGuardianName"></span></u>&nbsp;&nbsp;&nbsp;Occupation:&nbsp;&nbsp;&nbsp;<u><span id="applicantGuardianOccupation"></span></u>
        &nbsp;&nbsp;&nbsp;Contact No:&nbsp;&nbsp;&nbsp;<u><span id="applicantGuardianContactNo"></span></u>
        <br>
        <b>Scholastic Records:</b>
        <br>
        Type of School Last Attended:&nbsp;&nbsp;&nbsp;<u><span id="applicantLastSchoolAttendedType"></span></u>&nbsp;&nbsp;&nbsp;<u><span id="applicantLastSchoolAttendedCategory"></span></u>
        <br>
      </div>
    </div>

    <div class="flex-row">
      <div class=" printable-content">
        <table >
          <thead>
            <tr>
              <th>Name of Schools Attended</th>
              <th>Address</th>
              <th>Level</th>
              <th>Inclusive Date</th>
              <th>Honors & Awards Received</th>
            </tr>
          </thead>
          <tbody id="nameOfSchoolAttended">

          </tbody>
        </table>
        <br>
        General Weighted Average:&nbsp;&nbsp;&nbsp;<u><span id="applicantGWA"></span></u>
        <br>
        Membership in Organization/s:&nbsp;&nbsp;&nbsp;<u><span id="applicantMembershipOrgranization"></span></u>
        <br>
        Hobbies, Talents & Interests:&nbsp;&nbsp;&nbsp;<u><span id="applicantInterest"></span></u>
        <br>
      </div>

    </div>

    <div class="flex-row">
      <div class=" printable-content">

        <h3 id="character-reference">Character Reference</h3>
        Write down at least 2 names and address of persons as character references (Teacher/Adviser, Guidance Counselors, Barangay Officia, Priest/Pastor)
        <table >
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Contact Number</th>
            </tr>
          </thead>
          <tbody id="characterReference">

          </tbody>

        </table>
        <br><br>
      </div>
    </div>

    <div class="flex-row">
      <div class=" printable-content">
        I understand that my application for admission is subject to approval of the Admission Commitee of the University. By signing below, I certify that the information given is true and correct
        . Falsifying any og the information is sufficient ground for any legal action and rejection relative to my application. In addition, I understand that LNU has no obligation to provide
        my with reasons in case this application will be denied.
      </div>
    </div>

    <div class="flex-row justify-center ">
      <div class="printable-content applicant-signature">
        <u> <span id="applicantFullName"></span> </u>
        <br>
        Signature Above Printed Name
      </div>

      <div class="printable-content date-accomplish">
        <u><span id="date_applied"></span> </u>
        <br>
        Date
      </div>
    </div>

    <div class="flex-row justify-center">
      <div class="guidance-remarks">
        <p style="text-align: center">Guidance Remarks</p>
      </div>
    </div>


    <div class="flex-row">
      <div class="printable-content personalStatement">
        <h3>Personal Statement</h3>
        <p>Explain your purpose in seeking admission to the university and what personal objectives do you hope to achieve. <br>Your statement should reflect both organization of ideas and language fluency. <br>
          ________________________________________________________________________________________________________________________________________________________________________________________
          ________________________________________________________________________________________________________________________________________________________________________________________
          ________________________________________________________________________________________________________________________________________________________________________________________
          ________________________________________________________________________________________________________________________________________________________________________________________
          ________________________________________________________________________________________________________________________________________________________________________________________
        </p>
      </div>
    </div>


    <div class="flex-row ">
      <div class="printable-content coursePreferenceContainer" >
        <br>
        <h3>TO BE FILLED UP BY THE INTERVIEW OFFICER/S</h3>
      </div>
    </div>

    <div class="flex-row justify-center">
      <div class="coursePreferenceContainer">
        <h2 style="text-align: center">Interview Data</h2>
      </div>
    </div>

    <div class="flex-row justify-center">
      <div class="printable-content course-preference coursePreferenceContainer">
        <h3>First Course Preference: <span><u>Something</u></span></h3>
        Remarks:<br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        <br>
        Interview Officer:
        <br>
        <center>
          ________________________
          <br>
          Signature Above Printed Name
          <br>
          <br>
          Date of Interview: _________________
        </center>
      </div>

      <div class="printable-content course-preference coursePreferenceContainer">
        <h3>Second Course Preference: <span><u>Something</u></span> </h3>
        Remarks:<br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        ________________________________ <br>
        <br>
        Interview Officer:
        <br>
        <center>
          ________________________
          <br>
          Signature Above Printed Name
          <br>
          <br>
          Date of Interview: _________________
        </center>
      </div>
    </div>


  </div>
</div>

<div class="flex-row right buttonPrint">
  <div class="">
    <button type="button" name="button" onclick="printJS({printable: 'printable-form',type: 'html', css: ['con_f/styles/css/styles.css'], scanStyles: false})" id="print"><i class="fas fa-print"></i> Print</button>
  </div>
</div>
