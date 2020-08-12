$(document).ready(function() {
  $(function() {
    //First Form
    //Status Checkbox

    $("#btn-next-to-second-step").click(function() {
      if ($("input[name='status']:checked").val() !== "") {
        if ($("input[name='status']:checked").val() === "returnee-applicant") {
          if (
            $("#returnee-month").val() !== "" &&
            $("#returnee-year").val() !== "" &&
            $("input[name='passer-radio']:checked").val() !== "" &&
            $("#returnee-specify-course").val() !== "undefined" &&
            $("#first-course-preference").val() !== "" &&
            $("#second-course-preference").val() !== ""
          ) {
            $(".form-1").hide();
            $(".form-2").show();
            $(".step-1, #step-1-text").css("color", "green");
            $(".step-1-circle").css("background-color", "#012450");
            $(".step-2, #step-2-text").css("font-weight", "bold");
          }
        } else {
          if (
            $("#first-course-preference").val() !== "" &&
            $("#second-course-preference").val() !== ""
          ) {
            $(".form-1").hide();
            $(".form-2").show();
            $(".step-1, #step-1-text").css("color", "green");
            $(".step-1-circle").css("background-color", "#012450");
            $(".step-2, #step-2-text").css("font-weight", "bold");
          }
        }
      }
    });

    $("#btn-prev-to-first-step").click(function() {
      $(".form-1").show();
      $(".form-2").hide();
      $(".step-1, #step-1-text").css("color", "#012450");
      $(".step-1-circle").css("background-color", "#fafafa");
      $(".step-2, #step-2-text").css("font-weight", "normal");
      $(".step-2, #step-2-text").css("color", "#012450");
    });

    $("input[name='status']").click(function() {
      //IF returnee checkbox is checked
      if ($("#checkbox-returnee").is(":checked")) {
        $("#returnee").show();
      } else {
        $("#returnee").hide();
      }
    });
  }); //    End First Forms

  $("#btn-next-to-third-step").click(function() {
    if (
      $("#lname").val() !== "" &&
      $("#fname").val() !== "" &&
      $("#mname").val() !== "" &&
      $("#age").val() !== "" &&
      $("#gender").val() !== "" &&
      $("#status").val() !== "" &&
      $("#citizenship").val() !== "" &&
      $("#complete-homeAddress").val() !== "" &&
      $("#complete-cityAddress").val() !== "" &&
      $("#tel-no").val() !== "" &&
      $("#mobile-no").val() !== "" &&
      $("#email-adds").val() !== "" &&
      $("#parent-guardian").val() !== "" &&
      $("#occupation").val() !== "" &&
      $("#contact-no").val() !== ""
    ) {
      $(".form-2").hide();
      $(".form-3").show();
      $(".step-2, #step-2-text").css("color", "green");
      $(".step-2-circle").css("background-color", "#012450");
      $(".step-3, #step-3-text").css("font-weight", "bold");
    }
  });

  $("#btn-prev-to-second-step").click(function() {
    $(".form-3").hide();
    $(".form-2").show();
    $(".step-2, #step-2-text").css("color", "#012450");
    $(".step-2-circle").css("background-color", "#fafafa");
    $(".step-3, #step-3-text").css("font-weight", "normal");
    $(".step-3, #step-3-text").css("color", "#012450");
  });

  $("#btn-next-to-fourth-step").click(function() {
    if (
      $("input[name='type-of-school']:checked").val() !== "" &&
      $("input[name='school-category']").val() !== "" &&
      $("#first-school-name").val() !== "" &&
      $("#first-school-address").val() !== "" &&
      $("#first-school-level").val() !== "" &&
      $("#first-school-inclusiveDate").val() !== "" &&
      $("#first-school-award-received").val() !== "" &&
      $("#second-school-name").val() !== "" &&
      $("#second-school-address").val() !== "" &&
      $("#second-school-level").val() !== "" &&
      $("#second-school-inclusiveDate").val() !== "" &&
      $("#second-school-award-received").val() !== "" &&
      $("#general-weighted-average").val() !== "" &&
      $("#membership-organization").val() !== ""
    ) {
      $(".form-3").hide();
      $(".form-4").show();
      $(".step-3, #step-3-text").css("color", "green");
      $(".step-3-circle").css("background-color", "#012450");
      $(".step-4, #step-4-text").css("font-weight", "bold");
    }
  });

  //Fourth Form
  $(function() {
    $("#btn-submit").click(function() {
      if (
        $("#first-person-reference-name").val() !== "" &&
        $("#first-person-reference-address").val() !== "" &&
        $("#first-person-reference-cnum").val() !== "" &&
        $("#second-person-reference-name").val() !== "" &&
        $("#second-person-reference-address").val() !== "" &&
        $("#second-person-reference-cnum").val() !== ""
      ) {
        var bdate = new Date($("#bdate").val());
        bdate_day = bdate.getDate();
        bdate_month = bdate.getMonth() + 1;
        bdate_year = bdate.getFullYear();

        var firstSchoolInclusiveDate = new Date(
          $("#first-school-inclusiveDate").val()
        );
        firstSchoolInclusiveDate_day = firstSchoolInclusiveDate.getDate();
        firstSchoolInclusiveDate_month = firstSchoolInclusiveDate.getMonth();
        firstSchoolInclusiveDate_year = firstSchoolInclusiveDate.getFullYear();

        var secondSchoolInclusiveDate = new Date(
          $("#second-school-inclusiveDate").val()
        );
        secondSchoolInclusiveDate_day = secondSchoolInclusiveDate.getDate();
        secondSchoolInclusiveDate_month = secondSchoolInclusiveDate.getMonth();
        secondSchoolInclusiveDate_year = secondSchoolInclusiveDate.getFullYear();

        var thirdSchoolInclusiveDate = new Date(
          $("#third-school-inclusiveDate").val()
        );
        thirdSchoolInclusiveDate_day = thirdSchoolInclusiveDate.getDate();
        thirdSchoolInclusiveDate_month = thirdSchoolInclusiveDate.getMonth();
        thirdSchoolInclusiveDate_year = thirdSchoolInclusiveDate.getFullYear();

        var fourthSchoolInclusiveDate = new Date(
          $("#fourth-school-inclusiveDate").val()
        );
        fourthSchoolInclusiveDate_day = fourthSchoolInclusiveDate.getDate();
        fourthSchoolInclusiveDate_month = fourthSchoolInclusiveDate.getMonth();
        fourthSchoolInclusiveDate_year = fourthSchoolInclusiveDate.getFullYear();

        var returneePasser = "";
        if ($("input[name='passer-radio']").is(":checked")) {
          returneePasser = $("input[name='passer-radio']:checked").val();
        } else {
          returneePasser = "undefined";
        }

        var fourthSchoolName = "";
        var fourthSchoolAddress = "";
        var fourthSchoolLevel = "";
        var fourthSchoolAwardReceived = "";
        if (
          $("#fourth-school-name").val() !== "" &&
          $("#fourth-school-address").val() !== "" &&
          $("#fourth-school-level").val() !== "" &&
          $("#fourth-school-award-received").val() !== ""
        ) {
          fourthSchoolName = $("#fourth-school-name").val();
          fourthSchoolAddress = $("#fourth-school-address").val();
          fourthSchoolLevel = $("#fourth-school-level").val();
          fourthSchoolAwardReceived = $("#fourth-school-award-received").val();
        } else {
          fourthSchoolName = "undefined";
          fourthSchoolAddress = "undefined";
          fourthSchoolLevel = "undefined";
          fourthSchoolAwardReceived = "undefined";
        }

        console.log($("#application_period").val());

        $.ajax({
          url: "insert.php",
          type: "POST",
          dataType: "json",
          data: {
            applicationPeriod: $("#application_period").val(),
            applicationDate: [year, month, day].join("-"),
            appicantID: applicant_id,
            applicationType: $("input[name='status']:checked").val(),
            returneeMonth: $("#returnee-month").val(),
            returneeYear: $("#returnee-year").val(),
            returneePasser: returneePasser,
            returneeSelectedCourse: $("#returnee-specify-course").val(),
            firstCoursePreference: $("#first-course-preference").val(),
            secondCoursePreference: $("#second-course-preference").val(),
            lastName: $("#lname").val(),
            firstName: $("#fname").val(),
            middleName: $("#mname").val(),
            birthDay: [bdate_year, bdate_month, bdate_day].join("-"),
            age: $("#age").val(),
            sex: $("#sex").val(),
            status: $("#status").val(),
            citizenship: $("#citizenship").val(),
            completeHomeAddress: $("#complete-homeAddress").val(),
            completeCityAddress: $("#complete-cityAddress").val(),
            telNumber: $("#tel-no").val(),
            mobileNumber: $("#mobile-no").val(),
            emailAddress: $("#email-adds").val(),

            guardianName: $("#parent-guardian").val(),
            guardianOccupation: $("#occupation").val(),
            contactNumber: $("#contact-no").val(),

            typeOfSchool: $("input[name='type-of-school']:checked").val(),
            categoryOfSchool: $("input[name='school-category']:checked").val(),
            firstSchoolName: $("#first-school-name").val(),
            firstSchoolAddress: $("#first-school-address").val(),
            firstSchoolLevel: $("#first-school-level").val(),
            firstSchoolInclusiveDate: [
              firstSchoolInclusiveDate_year,
              firstSchoolInclusiveDate_month,
              firstSchoolInclusiveDate_day
            ].join("-"),
            firstSchoolAwardReceived: $("#first-school-award-received").val(),
            secondSchoolName: $("#second-school-name").val(),
            secondSchoolAddress: $("#second-school-address").val(),
            secondSchoolLevel: $("#second-school-level").val(),
            secondSchoolInclusiveDate: [
              secondSchoolInclusiveDate_year,
              secondSchoolInclusiveDate_month,
              secondSchoolInclusiveDate_day
            ].join("-"),
            secondSchoolAwardReceived: $("#second-school-award-received").val(),
            thirdSchoolName: $("#third-school-name").val(),
            thirdSchoolAddress: $("#third-school-address").val(),
            thirdSchoolLevel: $("#third-school-level").val(),
            thirdSchoolInclusiveDate: [
              thirdSchoolInclusiveDate_year,
              thirdSchoolInclusiveDate_month,
              thirdSchoolInclusiveDate_day
            ].join("-"),
            thirdSchoolAwardReceived: $("#third-school-award-received").val(),
            fourthSchoolName: fourthSchoolName,
            fourthSchoolAddress: fourthSchoolAddress,
            fourthSchoolLevel: fourthSchoolLevel,
            fourthSchoolInclusiveDate: [
              fourthSchoolInclusiveDate_year,
              fourthSchoolInclusiveDate_month,
              fourthSchoolInclusiveDate_day
            ].join("-"),
            fourthSchoolAwardReceived: fourthSchoolAwardReceived,
            generalWeightedAverage: $("#general-weighted-average").val(),
            membershipOrganization: $("#membership-organization").val(),
            hobbiesTalentsInterest: $("#hobbies-talents-interests").val(),
            firstPersonReferenceName: $("#first-person-reference-name").val(),
            firstPersonReferenceAddress: $(
              "#first-person-reference-address"
            ).val(),
            firstPersonReferenceContactNum: $(
              "#first-person-reference-cnum"
            ).val(),
            secondPersonReferenceName: $("#second-person-reference-name").val(),
            secondPersonReferenceAddress: $(
              "#second-person-reference-address"
            ).val(),
            secondPersonReferenceContactNum: $(
              "#second-person-reference-cnum"
            ).val()
          },
          cache: false,
          success: function(data) {

            if (data.insertApplicant === "success") {
              console.log(data);
              console.log("success");
              $(".modal-container").show();
              $(".backdrop").show();
              $("body").css("overflow", "hidden");
              if ($("input[name='status']:checked").val() === "new-applicant") {
                $("#statusNew").prop("checked", true);
              }

              if (
                $("input[name='status']:checked").val() ===
                "transferee-applicant"
              ) {
                $("#statusTransferee").prop("checked", true);
              }

              if (
                $("input[name='status']:checked").val() === "returnee-applicant"
              ) {
                $("#statusReturnee").prop("checked", true);
              }

              if ($("#returnee-month").val() !== "undefined") {
                $("#last_apply_month").text($("#returnee-month").val());
              }

              if ($("#returnee-year").val() !== "undefined") {
                $("#last_apply_year").text($("#returnee-year").val());
              }

              if ($("input[name='passer-radio']:checked").val() === "no") {
                $("#last_apply_passerNo").prop("checked", true);
              }

              if ($("input[name='passer-radio']:checked").val() === "yes") {
                $("#last_apply_passerYes").prop("checked", true);
              }

              if ($("#returnee-specify-course").val() !== "undefined") {
                $("#last_applyCourse").text(
                  $("#returnee-specify-course").val()
                );
              }

              $("#applicantFirstCoursePreference").text(
                $("#first-course-preference").val()
              );
              $("#applicantSecondCourserPreference").text(
                $("#second-course-preference").val()
              );
              $("#applicantLastName").text($("#lname").val());
              $("#applicantFirstName").text($("#fname").val());
              $("#applicantMiddleName").text($("#mname").val());
              $("#applicantDateOfBirth").text(
                [bdate_year, bdate_month, bdate_day].join("-")
              );
              $("#applicantAge").text($("#age").val());
              $("#applicantGender").text($("#sex").val());
              $("#applicantStatus").text($("#status").val());
              $("#applicantCitizenship").text($("#citizenship").val());
              $("#applicantHomeAddress").text($("#complete-homeAddress").val());
              $("#applicantCityAddress").text($("#complete-cityAddress").val());
              $("#applicantTelNo").text($("#tel-no").val());
              $("#applicantMobileNo").text($("#mobile-no").val());
              $("#applicantEmail").text($("#email-adds").val());
              $("#applicantGuardianName").text($("#parent-guardian").val());
              $("#applicantGuardianOccupation").text($("#occupation").val());
              $("#applicantGuardianContactNo").text($("#contact-no").val());
              $("#applicantLastSchoolAttendedType").text(
                $("input[name='type-of-school']:checked").val()
              );
              $("#applicantLastSchoolAttendedCategory").text(
                $("input[name='school-category']:checked").val()
              );

              $("#applicantGWA").text($("#general-weighted-average").val());
              $("#applicantMembershipOrgranization").text(
                $("#membership-organization").val()
              );
              $("#applicantInterest").text(
                $("#hobbies-talents-interests").val()
              );

              var fullName = $("#fname").val()+""+$("#mname").val()+""+$("#lname").val();

              $("#applicantFullName").text(fullName);
              $("#date_applied").text([year, month, day].join("-"));

              var nameOfSchoolAttended = [
                {
                  name: $("#first-school-name").val(),
                  address: $("#first-school-address").val(),
                  level: $("#first-school-level").val(),
                  inclusiveDate: [
                    firstSchoolInclusiveDate_year,
                    firstSchoolInclusiveDate_month,
                    firstSchoolInclusiveDate_day
                  ].join("-"),
                  award: $("#first-school-award-received").val()
                },

                {
                  name: $("#second-school-name").val(),
                  address: $("#second-school-address").val(),
                  level: $("#second-school-level").val(),
                  inclusiveDate: [
                    secondSchoolInclusiveDate_year,
                    secondSchoolInclusiveDate_month,
                    secondSchoolInclusiveDate_day
                  ].join("-"),
                  award: $("#second-school-award-received").val()
                },
                {
                  name: $("#third-school-name").val(),
                  address: $("#third-school-address").val(),
                  level: $("#third-school-level").val(),
                  inclusiveDate: [
                    thirdSchoolInclusiveDate_year,
                    thirdSchoolInclusiveDate_month,
                    thirdSchoolInclusiveDate_day
                  ].join("-"),
                  award: $("#third-school-award-received").val()
                },
                {
                  name: fourthSchoolName,
                  address: fourthSchoolAddress,
                  level: fourthSchoolLevel,
                  inclusiveDate: [
                    fourthSchoolInclusiveDate_year,
                    fourthSchoolInclusiveDate_month,
                    fourthSchoolInclusiveDate_day
                  ].join("-"),
                  award: fourthSchoolAwardReceived
                }
              ];

              var tbl1 = "";
              for (var i = 0; i < nameOfSchoolAttended.length; i++) {
                tbl1 += "<tr>";
                tbl1 += "<td>" + nameOfSchoolAttended[i]["name"] + "</td>";
                tbl1 += "<td>" + nameOfSchoolAttended[i]["address"] + "</td>";
                tbl1 += "<td>" + nameOfSchoolAttended[i]["level"] + "</td>";
                tbl1 +=
                  "<td>" + nameOfSchoolAttended[i]["inclusiveDate"] + "</td>";
                tbl1 += "<td>" + nameOfSchoolAttended[i]["award"] + "</td>";
                tbl1 += "</tr>";
              }

              $("#nameOfSchoolAttended").prepend(tbl1);

              var characterReference = [
                {
                  name: $("#first-person-reference-name").val(),
                  address: $("#first-person-reference-address").val(),
                  cnum: $("#first-person-reference-cnum").val()
                },
                {
                  name: $("#second-person-reference-name").val(),
                  address: $("#second-person-reference-address").val(),
                  cnum: $("#second-person-reference-cnum").val()
                }
              ];

              var tbl2 = "";
              for (var i = 0; i < characterReference.length; i++) {
                tbl2 += "<tr>";
                tbl2 += "<td>"+characterReference[i]["name"]+"</td>";
                tbl2 += "<td>"+characterReference[i]["address"]+"</td>";
                tbl2 += "<td>"+characterReference[i]["cnum"]+"</td>";
                tbl2 += "</tr>";
              }

              $("#characterReference").prepend(tbl2);
            } else {
              console.log("failed");
            }
          },
          error: function(error) {
            console.log(error);
          }
        });
      }
    });
  }); //End of Fourth Form

  $("#prog-application").click(function(event) {
    event.preventDefault();
    $(".form-1").show();
    $(".form-2").hide();
    $(".form-3").hide();
    $(".form-4").hide();
  });

  $("#prog-personal").click(function(event) {
    event.preventDefault();
    $(".form-2").show();
    $(".form-1").hide();
    $(".form-3").hide();
    $(".form-4").hide();
  });

  $("#prog-schoolRecords").click(function(event) {
    event.preventDefault();
    $(".form-3").show();
    $(".form-1").hide();
    $(".form-2").hide();
    $(".form-4").hide();
  });

  $("#prog-charRefer").click(function(event) {
    event.preventDefault();
    $(".form-4").show();
    $(".form-1").hide();
    $(".form-2").hide();
    $(".form-3").hide();
  });

  $("#arrow-right").click(function() {
    $("#vision").hide();
    $("#mission").show();
  });

  $("#arrow-left").click(function() {
    $("#mission").hide();
    $("#vision").show();
  });

  $("#apply-now").click(function() {
    $(".main-page").hide();
    $(".form_application").show();
    $("#apply-now").hide();
    $("#backToHome").show();
  });

  $("#btn-modal").click(function() {
    $(".modal-container").hide();
    $(".backdrop").hide();
    $(".form_application").hide();
    $(".main-page").hide();
    $("body").css("overflow", "auto");
    $(".printable-page").show();
    $(".buttonPrint").show();
    $(".printable-form-container").show();
    $("#apply-now").hide();
    $("#backToHome").show();
  });

  $("#link-schedule").click(function(){
    $(".applicant").hide();
    $(".enrolled").hide();
    $(".schedule").show();
    $(".forExam").hide();
    $(".forInterview").hide();
    $(".forQualified").hide();
      $(".userManagement").hide();
    $(".sidebar-applicant").css("background","#fafafa");
    $(".sidebar-applicant > a").css("color","#333");
    $(".sidebar-enrolled").css("background","#fafafa");
    $(".sidebar-enrolled > a ").css("color","#333");
    $(".sidebar-schedule").css("background","#333");
    $(".sidebar-schedule > a").css("color","#fafafa");
    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#fafafa");
    $(".sidebar-userManagement > a").css("color","#333");

    $(".sidebar-forQualified").css("background","#fafafa");
    $(".sidebar-forQualified > a ").css("color","#333");
    $(".sidebar-forInterview").css("background","#fafafa");
    $(".sidebar-forInterview > a").css("color","#333");
    $(".sidebar-forExam").css("background","#fafafa");
    $(".sidebar-forExam > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#link-applicants").click(function(){
    $("#tbl-nameOfSchoolAttended tbody tr").remove();
    $("#tbl-characterReference tbody tr").remove();
    $(".applicant").show();
    $(".enrolled").hide();
    $(".schedule").hide();
    $(".forExam").hide();
    $(".forInterview").hide();
    $(".forQualified").hide();
    $(".userManagement").hide();
    $(".sidebar-applicant").css("background","#333");
    $(".sidebar-applicant > a").css("color","#fafafa");
    $(".sidebar-enrolled").css("background","#fafafa");
    $(".sidebar-enrolled > a ").css("color","#333");
    $(".sidebar-schedule").css("background","#fafafa");
    $(".sidebar-schedule > a").css("color","#333");
    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#fafafa");
    $(".sidebar-userManagement > a").css("color","#333");

    $(".sidebar-forQualified").css("background","#fafafa");
    $(".sidebar-forQualified > a ").css("color","#333");
    $(".sidebar-forInterview").css("background","#fafafa");
    $(".sidebar-forInterview > a").css("color","#333");
    $(".sidebar-forExam").css("background","#fafafa");
    $(".sidebar-forExam > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#link-forExam").click(function(){
    $("#tbl-nameOfSchoolAttended tbody tr").remove();
    $("#tbl-characterReference tbody tr").remove();
    $(".applicant").hide();
    $(".forExam").show();
    $(".schedule").hide();
    $(".forInterview").hide();
    $(".forQualified").hide();
    $(".userManagement").hide();
    $(".sidebar-applicant").css("background","#fafafa");
    $(".sidebar-applicant > a").css("color","#333");
    $(".sidebar-forExam").css("background","#333");
    $(".sidebar-forExam > a ").css("color","#fafafa");
    $(".sidebar-schedule").css("background","#fafafa");
    $(".sidebar-schedule > a").css("color","#333");
    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#fafafa");
    $(".sidebar-userManagement > a").css("color","#333");

    $(".sidebar-forInterview").css("background","#fafafa");
    $(".sidebar-forInterview > a").css("color","#333");
    $(".sidebar-forQualified").css("background","#fafafa");
    $(".sidebar-forQualified > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#link-forInterview").click(function(){
    $("#tbl-nameOfSchoolAttended tbody tr").remove();
    $("#tbl-characterReference tbody tr").remove();
    $(".applicant").hide();
    $(".forExam").hide();
    $(".schedule").hide();
    $(".forInterview").show();
    $(".forQualified").hide();
    $(".userManagement").hide();
    $(".sidebar-applicant").css("background","#fafafa");
    $(".sidebar-applicant > a").css("color","#333");
    $(".sidebar-forInterview").css("background","#333");
    $(".sidebar-forInterview > a ").css("color","#fafafa");
    $(".sidebar-schedule").css("background","#fafafa");
    $(".sidebar-schedule > a").css("color","#333");
    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#fafafa");
    $(".sidebar-userManagement > a").css("color","#333");

    $(".sidebar-forExam").css("background","#fafafa");
    $(".sidebar-forExam > a").css("color","#333");
    $(".sidebar-forQualified").css("background","#fafafa");
    $(".sidebar-forQualified > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#link-forQualified").click(function(){
    $("#tbl-nameOfSchoolAttended tbody tr").remove();
    $("#tbl-characterReference tbody tr").remove();
    $(".applicant").hide();
    $(".forExam").hide();
    $(".schedule").hide();
    $(".forInterview").hide();
    $(".forQualified").show();
    $(".userManagement").hide();
    $(".sidebar-applicant").css("background","#fafafa");
    $(".sidebar-applicant > a").css("color","#333");
    $(".sidebar-forQualified").css("background","#333");
    $(".sidebar-forQualified > a ").css("color","#fafafa");
    $(".sidebar-schedule").css("background","#fafafa");
    $(".sidebar-schedule > a").css("color","#333");
    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#fafafa");
    $(".sidebar-userManagement > a").css("color","#333");

    $(".sidebar-forInterview").css("background","#fafafa");
    $(".sidebar-forInterview > a").css("color","#333");
    $(".sidebar-forExam").css("background","#fafafa");
    $(".sidebar-forExam > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#link-userManagement").click(function(){
    $("#tbl-nameOfSchoolAttended tbody tr").remove();
    $("#tbl-characterReference tbody tr").remove();
    $(".applicant").hide();
    $(".schedule").hide();
    $(".forExam").hide();
    $(".forInterview").hide();
    $(".forQualified").hide();
    $(".userManagement").show();
    $(".sidebar-applicant").css("background","#fafafa");
    $(".sidebar-applicant > a").css("color","#333");
    $(".sidebar-schedule").css("background","#fafafa");
    $(".sidebar-schedule > a").css("color","#333");

    $(".sidebar-logout").css("background","#fafafa");
    $(".sidebar-logout > a").css("color","#333");
    $(".sidebar-userManagement").css("background","#333");
    $(".sidebar-userManagement > a").css("color","#fafafa");

    $(".sidebar-forQualified").css("background","#fafafa");
    $(".sidebar-forQualified > a ").css("color","#333");
    $(".sidebar-forInterview").css("background","#fafafa");
    $(".sidebar-forInterview > a").css("color","#333");
    $(".sidebar-forExam").css("background","#fafafa");
    $(".sidebar-forExam > a").css("color","#333");

    $(".printable-form-container-admin").hide();
    $(".buttonPrint").hide();
  });

  $("#btn-admin-login").click(function(){


    if ($("#username").val() !== "" &&
        $("#password").val() !== "") {
        $.ajax({
          url: "login-action.php",
          type: "POST",
          dataType: "json",
          data: {
            username: $("#username").val(),
            password: $("#password").val()
          },
          cache: false,
            success: function(data){
            window.location.replace("http://localhost/online-application/admin/");
          },
          error: function(err){
            alert("Unregistered user");
            //window.location.replace("http://localhost/online-application/admin/");
          }
        });
    }else{
      $("#username").css("border", "1px solid red");
      $("#password").css("border", "1px solid red");
    }
  });

  $("#btn-set-schedule").click(function(){

    var dateStart = new Date(
      $("#date_start").val()
    );
    dateStart_day = dateStart.getDate();
    dateStart_month = dateStart.getMonth();
    dateStart_year = dateStart.getFullYear();

    var dateEnd = new Date(
      $("#date_end").val()
    );
    dateEnd_day = dateEnd.getDate();
    dateEnd_month = dateEnd.getMonth();
    dateEnd_year = dateEnd.getFullYear();

    $.ajax({
      url: "setApplicationPeriod-action.php",
      type: "POST",
      dataType: "json",
      data: {
        term: $("#term").val(),
        schoolYear: $("#school_year").val(),
        dateStart: [dateStart_year, dateStart_month+1, dateStart_day].join("-"),
        dateEnd: [dateEnd_year, dateEnd_month+1, dateEnd_day].join("-")
      },
      success: function(data){
        console.log(data);
        location.reload(true);
      },
      error: function(err){
        alert("error");
        console.log(err);
      }
    });
  });

  $('#table_id').DataTable();
  $("#tbl_approvedApplicants").DataTable();
  $("#tbl_forInterview").DataTable();
  $("#tbl_qualified").DataTable();
  $("#tbl-userManagement").DataTable();
  $("#tbl-interviewer").DataTable();
  $("#tbl-doneInterviews").DataTable();
  $("#tbl-qualifiedApplicant").DataTable();

 $(".btn-viewApplicant").click(function(){
   var value = $(this).attr("value");
   console.log(value);

   $.ajax({
     url: "applicant.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value
     },
     success: function(data){
       console.log(data);
       $(".applicant").hide();
       $(".view-applicant").show();
       $(".printable-form-container-admin").show();
       $(".buttonPrint").show();


       if (data.applicationType === "new-applicant") {
         $("#statusNew").prop("checked",true);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "transferee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",true);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "returnee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",true);
       }


        if (data.returneePasser === "no") {
          $("#last_apply_passerNo").prop("checked",true);
          $("#last_apply_passerYes").prop("checked",false);

          $("#last_apply_month").text("N/A");
          $("#last_apply_year").text("N/A");
          $("#last_applyCourse").text("N/A");
        }

        if (data.returneePasser === "yes") {
          $("#last_apply_passerNo").prop("checked",false);
          $("#last_apply_passerYes").prop("checked",true);

          $("#last_apply_month").text(data.returneeMonth);
          $("#last_apply_year").text(data.returneeYear);
          $("#last_applyCourse").text(data.returneeSelectedCourse);
        }


        $("#schoolYear").text(data.schoolYear);
        $("#term").text(data.term);
        $("#applicantFirstCoursePreference").text(data.firstCoursePreference);
        $("#applicantSecondCourserPreference").text(data.secondCoursePreference);
        $("#applicantLastName").text(data.lname);
        $("#applicantFirstName").text(data.fname);
        $("#applicantMiddleName").text(data.mname);
        $("#applicantDateOfBirth").text(data.dateOfBirth);
        $("#applicantAge").text(data.age);
        $("#applicantGender").text(data.sex);
        $("#applicantStatus").text(data.civilStatus);
        $("#applicantCitizenship").text(data.citizenship);
        $("#applicantHomeAddress").text(data.completeHomeAddress);
        $("#applicantCityAddress").text(data.completeCityAddress);
        $("#applicantTelNo").text(data.telNo);
        $("#applicantMobileNo").text(data.mobileNo);
        $("#applicantEmail").text(data.emailAdd);
        $("#applicantGuardianName").text(data.guardianName);
        $("#applicantGuardianOccupation").text(data.guardianOccupation);
        $("#applicantGuardianContactNo").text(data.guardianContactNo);
        $("#applicantLastSchoolAttendedType").text(data.typeOfSchoolLastAttended);
        $("#applicantLastSchoolAttendedCategory").text(data.categoryOfSchoolLastAttended);
        //nameOfSchoolAttended
        //console.log(data.schoolAttended[0]['reference'][0]);
         var tbl = "";
        for (var i = 0; i < data.schoolAttended.length; i++) {
          //console.log("i "+i);
          tbl += "<tr>";
          for (var x = 0; x < data.schoolAttended[i]['school'].length; ++x) {
            //console.log(data.schoolAttended[i]['reference'][x]);
            tbl +=
              "<td><label>" +data.schoolAttended[i]['school'][x]+ "</label></td>";

          }
          tbl += "</tr>";
          //console.log(data.schoolAttended[i]['reference'][i]);

        }

        $("#nameOfSchoolAttended").prepend(tbl);

        $("#applicantGWA").text(data.gwa);
        $("#applicantMembershipOrgranization").text(data.membershipOrganization);
        $("#applicantInterest").text(data.hobbiesAndTalent);
        //characterReference

        var tbl1 = "";
       for (var z = 0; z < data.character_reference.length; z++) {
         //console.log("i "+i);
         tbl1 += "<tr>";
         for (var q = 0; q < data.character_reference[z]['reference'].length; ++q) {
           //console.log(data.schoolAttended[i]['reference'][x]);
           tbl1 +=
             "<td><label>" +data.character_reference[z]['reference'][q]+ "</label></td>";

         }
         tbl1 += "</tr>";
         //console.log(data.schoolAttended[i]['reference'][i]);

       }

       $("#characterReference").prepend(tbl1);

        $("#applicantFullName").text(data.fname+" "+data.mname+". "+data.lname);
        $("#date_applied").text(data.applicationDate);
     },
     error: function(err){
       alert(err);
     }
   });
 });

 $(".btn-viewApplicantForExam").click(function(){
   var value = $(this).attr("value");
   console.log(value);
   $(".forExam").hide();
   $.ajax({
     url: "applicant.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value
     },
     success: function(data){
       console.log(data);
       $(".applicant").hide();
       $(".view-applicant").show();
       $(".printable-form-container-admin").show();
       $(".buttonPrint").show();


       if (data.applicationType === "new-applicant") {
         $("#statusNew").prop("checked",true);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "transferee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",true);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "returnee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",true);
       }


        if (data.returneePasser === "no") {
          $("#last_apply_passerNo").prop("checked",true);
          $("#last_apply_passerYes").prop("checked",false);

          $("#last_apply_month").text("N/A");
          $("#last_apply_year").text("N/A");
          $("#last_applyCourse").text("N/A");
        }

        if (data.returneePasser === "yes") {
          $("#last_apply_passerNo").prop("checked",false);
          $("#last_apply_passerYes").prop("checked",true);

          $("#last_apply_month").text(data.returneeMonth);
          $("#last_apply_year").text(data.returneeYear);
          $("#last_applyCourse").text(data.returneeSelectedCourse);
        }


        $("#schoolYear").text(data.schoolYear);
        $("#term").text(data.term);
        $("#applicantFirstCoursePreference").text(data.firstCoursePreference);
        $("#applicantSecondCourserPreference").text(data.secondCoursePreference);
        $("#applicantLastName").text(data.lname);
        $("#applicantFirstName").text(data.fname);
        $("#applicantMiddleName").text(data.mname);
        $("#applicantDateOfBirth").text(data.dateOfBirth);
        $("#applicantAge").text(data.age);
        $("#applicantGender").text(data.sex);
        $("#applicantStatus").text(data.civilStatus);
        $("#applicantCitizenship").text(data.citizenship);
        $("#applicantHomeAddress").text(data.completeHomeAddress);
        $("#applicantCityAddress").text(data.completeCityAddress);
        $("#applicantTelNo").text(data.telNo);
        $("#applicantMobileNo").text(data.mobileNo);
        $("#applicantEmail").text(data.emailAdd);
        $("#applicantGuardianName").text(data.guardianName);
        $("#applicantGuardianOccupation").text(data.guardianOccupation);
        $("#applicantGuardianContactNo").text(data.guardianContactNo);
        $("#applicantLastSchoolAttendedType").text(data.typeOfSchoolLastAttended);
        $("#applicantLastSchoolAttendedCategory").text(data.categoryOfSchoolLastAttended);
        //nameOfSchoolAttended
        //console.log(data.schoolAttended[0]['reference'][0]);
         var tbl = "";
        for (var i = 0; i < data.schoolAttended.length; i++) {
          //console.log("i "+i);
          tbl += "<tr>";
          for (var x = 0; x < data.schoolAttended[i]['school'].length; ++x) {
            //console.log(data.schoolAttended[i]['reference'][x]);
            tbl +=
              "<td><label>" +data.schoolAttended[i]['school'][x]+ "</label></td>";

          }
          tbl += "</tr>";
          //console.log(data.schoolAttended[i]['reference'][i]);

        }

        $("#nameOfSchoolAttended").prepend(tbl);

        $("#applicantGWA").text(data.gwa);
        $("#applicantMembershipOrgranization").text(data.membershipOrganization);
        $("#applicantInterest").text(data.hobbiesAndTalent);
        //characterReference

        var tbl1 = "";
       for (var z = 0; z < data.character_reference.length; z++) {
         //console.log("i "+i);
         tbl1 += "<tr>";
         for (var q = 0; q < data.character_reference[z]['reference'].length; ++q) {
           //console.log(data.schoolAttended[i]['reference'][x]);
           tbl1 +=
             "<td><label>" +data.character_reference[z]['reference'][q]+ "</label></td>";

         }
         tbl1 += "</tr>";
         //console.log(data.schoolAttended[i]['reference'][i]);

       }

       $("#characterReference").prepend(tbl1);

        $("#applicantFullName").text(data.fname+" "+data.mname+". "+data.lname);
        $("#date_applied").text(data.applicationDate);
     },
     error: function(err){
       alert(err);
     }
   });
 });


 $(".btn-evaluateApplicantForExam").click(function(){
   var value = $(this).attr("value");
   console.log(value);

    $("#"+value+"_art").show();
    $("#"+value+"_sci").show();
    $("#"+value+"_nat").show()
    $("#"+value+"_pro").show();
    $("#"+value+"_mec").show();
    $("#"+value+"_ind").show();
    $("#"+value+"_bus").show();
    $("#"+value+"_sel").show();
    $("#"+value+"_acc").show();
    $("#"+value+"_hum").show();
    $("#"+value+"_lea").show();
    $("#"+value+"_phy").show();
   $("#"+value+"_btnSubmitEvaluate").show();
   $("#"+value+"_btnViewApplicant").hide();
   $("#"+value+"_btnEvaluate").hide();
   $("#"+value+"_btnCancelEvaluate").show();
 });

 $(".cancelExamEvaluation").click(function(){
   var value = $(this).attr("value");
   console.log(value);


   $("#"+value+"_art").hide();
   $("#"+value+"_sci").hide();
   $("#"+value+"_nat").hide()
   $("#"+value+"_pro").hide();
   $("#"+value+"_mec").hide();
   $("#"+value+"_ind").hide();
   $("#"+value+"_bus").hide();
   $("#"+value+"_sel").hide();
   $("#"+value+"_acc").hide();
   $("#"+value+"_hum").hide();
   $("#"+value+"_lea").hide();
   $("#"+value+"_phy").hide();
  $("#"+value+"_btnSubmitEvaluate").hide();
  $("#"+value+"_btnViewApplicant").show();
  $("#"+value+"_btnEvaluate").show();
  $("#"+value+"_btnCancelEvaluate").hide();

  $("#"+value+"_art").css("border","1px solid #E0E0E0");
  $("#"+value+"_sci").css("border","1px solid #E0E0E0");
  $("#"+value+"_nat").css("border","1px solid #E0E0E0");
  $("#"+value+"_pro").css("border","1px solid #E0E0E0");
  $("#"+value+"_mec").css("border","1px solid #E0E0E0");
  $("#"+value+"_ind").css("border","1px solid #E0E0E0");
  $("#"+value+"_bus").css("border","1px solid #E0E0E0");
  $("#"+value+"_sel").css("border","1px solid #E0E0E0");
  $("#"+value+"_acc").css("border","1px solid #E0E0E0");
  $("#"+value+"_hum").css("border","1px solid #E0E0E0");
  $("#"+value+"_lea").css("border","1px solid #E0E0E0");
  $("#"+value+"_phy").css("border","1px solid #E0E0E0");
 });

 $(".submitExamResult").click(function(){
   var value = $(this).attr("value");
   console.log(value);

   if (
     $("#"+value+"_art").val() !== "" &&
     $("#"+value+"_sci").val() !== "" &&
     $("#"+value+"_nat").val() !== "" &&
     $("#"+value+"_pro").val() !== "" &&
     $("#"+value+"_mec").val() !== "" &&
     $("#"+value+"_ind").val() !== "" &&
     $("#"+value+"_bus").val() !== "" &&
     $("#"+value+"_sel").val() !== "" &&
     $("#"+value+"_acc").val() !== "" &&
     $("#"+value+"_hum").val() !== "" &&
     $("#"+value+"_lea").val() !== "" &&
     $("#"+value+"_phy").val() !== ""
   ) {
     $.ajax({
       url: "insertExamResult.php",
       type: "POST",
       dataType: "json",
       data:{
         id: value,
         art: $("#"+value+"_art").val(),
         sci: $("#"+value+"_sci").val(),
         nat: $("#"+value+"_nat").val(),
         pro: $("#"+value+"_pro").val(),
         mec: $("#"+value+"_mec").val(),
         ind: $("#"+value+"_ind").val(),
         bus: $("#"+value+"_bus").val(),
         sel: $("#"+value+"_sel").val(),
         acc: $("#"+value+"_acc").val(),
         hum: $("#"+value+"_hum").val(),
         lea: $("#"+value+"_lea").val(),
         phy: $("#"+value+"_phy").val()
       },
       success: function(data){
         console.log(data);
         if (data.insert === "success") {
           location.reload(true);
         }
       },
       error: function(err){

       }
     });


   }else{
     $("#"+value+"_art").css("border","1px solid red");
     $("#"+value+"_sci").css("border","1px solid red");
     $("#"+value+"_nat").css("border","1px solid red");
     $("#"+value+"_pro").css("border","1px solid red");
     $("#"+value+"_mec").css("border","1px solid red");
     $("#"+value+"_ind").css("border","1px solid red");
     $("#"+value+"_bus").css("border","1px solid red");
     $("#"+value+"_sel").css("border","1px solid red");
     $("#"+value+"_acc").css("border","1px solid red");
     $("#"+value+"_hum").css("border","1px solid red");
     $("#"+value+"_lea").css("border","1px solid red");
     $("#"+value+"_phy").css("border","1px solid red");
   }
 });

 $(".editUser").click(function(){
    var value = $(this).attr("value");
    console.log(value);
    $("#"+value+"_uname").hide();
    $("#"+value+"_inputUname").show();
    $("#"+value+"_inputPword").prop("disabled", false);
    $("#"+value+"_role").hide();
    $("#"+value+"_inputRole").show();
    $("#"+value+"_office").hide();
    $("#"+value+"_inputOffice").show();
    $("#"+value+"_editUser").hide();
    $("#"+value+"_deleteUser").hide();
    $("#"+value+"_saveUser").show();
    $("#"+value+"_cancelUser").show();
 });

 $(".cancelUser").click(function(){
   var value = $(this).attr("value");
   console.log(value);
   $("#"+value+"_uname").show();
   $("#"+value+"_inputUname").hide();
   $("#"+value+"_inputPword").prop("disabled", true);
   $("#"+value+"_role").show();
   $("#"+value+"_inputRole").hide();
   $("#"+value+"_office").show();
   $("#"+value+"_inputOffice").hide();
   $("#"+value+"_editUser").show();
   $("#"+value+"_deleteUser").show();
   $("#"+value+"_saveUser").hide();
   $("#"+value+"_cancelUser").hide();
 });

 $(".saveUser").click(function(){
   var value = $(this).attr("value");
   console.log(value);

   if ($("#"+value+"_inputUname").val() !== "" && $("#"+value+"_inputPword").val() !== "" && $("#"+value+"_inputRole").val() !== "") {
     $.ajax({
       url: "updateAdminUserInfo.php",
       type: "POST",
       dataType: "json",
       data:{
         id: value,
         uname: $("#"+value+"_inputUname").val(),
         pword: $("#"+value+"_inputPword").val(),
         role: $("#"+value+"_inputRole").val(),
         office: $("#"+value+"_inputOffice").val()
       },
       success: function(data){
         console.log(data);
         location.reload(true);
       },
       error: function(err){
         alert(err);
       }
     });
   }else{
     $("#"+value+"_uname").show();
     $("#"+value+"_inputUname").hide();
     $("#"+value+"_inputPword").prop("disabled", true);
     $("#"+value+"_role").show();
     $("#"+value+"_inputRole").hide();
     $("#"+value+"_office").show();
     $("#"+value+"_inputOffice").hide();
     $("#"+value+"_editUser").show();
     $("#"+value+"_deleteUser").show();
     $("#"+value+"_saveUser").hide();
     $("#"+value+"_cancelUser").hide();
   }


 });

 $(".deleteUser").click(function(){
   var value = $(this).attr("value");
   console.log(value);
   $.ajax({
     url: "deleteAdminUser.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value
     },
     success: function(data){
       console.log(data);
       location.reload(true);
     },
     error: function(err){
       alert(err);
     }
   });
 });

 $("#btn-addNewUser").click(function(){
   if ($("#admin_uname").val() !== "" && $("#admin_pword").val() !== "" && $("#admin_role").val() !== "" && $("#office").val() !== "") {
     $.ajax({
       url: "addAdminUser.php",
       type: "POST",
       dataType: "json",
       data:{
         uname: $("#admin_uname").val(),
         pword: $("#admin_pword").val(),
         role: $("#admin_role").val(),
         office: $("#office").val()
       },
       success: function(data){
         console.log(data);
         if (data.insert === "dupplicate") {
           alert("Data Already exist!");
         }

         if (data.insert === "success") {
           location.reload(true);
         }

       },
       error: function(err){
         alert(err);
       }
     });
   }else{
     alert("Required input fields...");
   }
 });

 $(".viewApplicantInterviewee").click(function(event){
   event.preventDefault();
   var value = $(this).attr("value");
   console.log(value);

   $.ajax({
     url: "applicant.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value
     },
     success: function(data){
       console.log(data);
       $("#for-interview").hide();
       $("#back-home").show();
       $(".interviewer-container").hide();
       $(".view-doneInterview").hide();
       $(".view-qualified").hide();
       $(".view-applicant").show();
       $(".printable-form-container-admin").show();
       $(".buttonPrint").show();


       if (data.applicationType === "new-applicant") {
         $("#statusNew").prop("checked",true);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "transferee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",true);
         $("#statusReturnee").prop("checked",false);
       }

       if (data.applicationType === "returnee-applicant") {
         $("#statusNew").prop("checked",false);
         $("#statusTransferee").prop("checked",false);
         $("#statusReturnee").prop("checked",true);
       }


        if (data.returneePasser === "no") {
          $("#last_apply_passerNo").prop("checked",true);
          $("#last_apply_passerYes").prop("checked",false);

          $("#last_apply_month").text("N/A");
          $("#last_apply_year").text("N/A");
          $("#last_applyCourse").text("N/A");
        }

        if (data.returneePasser === "yes") {
          $("#last_apply_passerNo").prop("checked",false);
          $("#last_apply_passerYes").prop("checked",true);

          $("#last_apply_month").text(data.returneeMonth);
          $("#last_apply_year").text(data.returneeYear);
          $("#last_applyCourse").text(data.returneeSelectedCourse);
        }

        $("#schoolYear").text(data.schoolYear);
        $("#term").text(data.term);
        $("#applicantFirstCoursePreference").text(data.firstCoursePreference);
        $("#applicantSecondCourserPreference").text(data.secondCoursePreference);
        $("#applicantLastName").text(data.lname);
        $("#applicantFirstName").text(data.fname);
        $("#applicantMiddleName").text(data.mname);
        $("#applicantDateOfBirth").text(data.dateOfBirth);
        $("#applicantAge").text(data.age);
        $("#applicantGender").text(data.sex);
        $("#applicantStatus").text(data.civilStatus);
        $("#applicantCitizenship").text(data.citizenship);
        $("#applicantHomeAddress").text(data.completeHomeAddress);
        $("#applicantCityAddress").text(data.completeCityAddress);
        $("#applicantTelNo").text(data.telNo);
        $("#applicantMobileNo").text(data.mobileNo);
        $("#applicantEmail").text(data.emailAdd);
        $("#applicantGuardianName").text(data.guardianName);
        $("#applicantGuardianOccupation").text(data.guardianOccupation);
        $("#applicantGuardianContactNo").text(data.guardianContactNo);
        $("#applicantLastSchoolAttendedType").text(data.typeOfSchoolLastAttended);
        $("#applicantLastSchoolAttendedCategory").text(data.categoryOfSchoolLastAttended);
        //nameOfSchoolAttended
        //console.log(data.schoolAttended[0]['reference'][0]);
         var tbl = "";
        for (var i = 0; i < data.schoolAttended.length; i++) {
          //console.log("i "+i);
          tbl += "<tr>";
          for (var x = 0; x < data.schoolAttended[i]['school'].length; ++x) {
            //console.log(data.schoolAttended[i]['reference'][x]);
            tbl +=
              "<td><label>" +data.schoolAttended[i]['school'][x]+ "</label></td>";

          }
          tbl += "</tr>";
          //console.log(data.schoolAttended[i]['reference'][i]);

        }

        $("#nameOfSchoolAttended").prepend(tbl);

        $("#applicantGWA").text(data.gwa);
        $("#applicantMembershipOrgranization").text(data.membershipOrganization);
        $("#applicantInterest").text(data.hobbiesAndTalent);
        //characterReference

        var tbl1 = "";
       for (var z = 0; z < data.character_reference.length; z++) {
         //console.log("i "+i);
         tbl1 += "<tr>";
         for (var q = 0; q < data.character_reference[z]['reference'].length; ++q) {
           //console.log(data.schoolAttended[i]['reference'][x]);
           tbl1 +=
             "<td><label>" +data.character_reference[z]['reference'][q]+ "</label></td>";

         }
         tbl1 += "</tr>";
         //console.log(data.schoolAttended[i]['reference'][i]);

       }

       $("#characterReference").prepend(tbl1);

        $("#applicantFullName").text(data.fname+" "+data.mname+". "+data.lname);
        $("#date_applied").text(data.applicationDate);
     },
     error: function(err){
       alert(err);
     }
   });
 });

 $("#back-home").click(function(event){
   event.preventDefault();
   $("#for-interview").show();
   $("#back-home").hide();
   $(".interviewer-container").show();
   $(".view-applicant").hide();
   $(".printable-form-container-admin").hide();
   $(".buttonPrint").hide();
   $(".view-doneInterview").hide();
   $(".view-qualified").hide();
   $("#tbl-nameOfSchoolAttended tbody tr").remove();
   $("#tbl-characterReference tbody tr").remove();
 });

 $(".evauluateApplicantInterviewee").click(function(event){
   event.preventDefault();
   var value = $(this).attr("value");
   console.log(value);

    $("#"+value+"_grammar").show();
    $("#"+value+"_clarity").show();
    $("#"+value+"_fluency").show();
    $("#"+value+"_development_deliveryOfInfo").show();
    $("#"+value+"_interest").show();
    $("#"+value+"_viewApplicantInterviewee").hide();
    $("#"+value+"_evalutateApplicantInterviewee").hide();
    $("#"+value+"_saveApplicantInterviewee").show();
    $("#"+value+"_cancelApplicantInterviewee").show();
 });

 $(".cancelApplicantInterviewee").click(function(event){
   event.preventDefault();
   var value = $(this).attr("value");
   console.log(value);

   $("#"+value+"_grammar").hide();
   $("#"+value+"_clarity").hide();
   $("#"+value+"_fluency").hide();
   $("#"+value+"_development_deliveryOfInfo").hide();
   $("#"+value+"_interest").hide();
   $("#"+value+"_viewApplicantInterviewee").show();
   $("#"+value+"_evalutateApplicantInterviewee").show();
   $("#"+value+"_saveApplicantInterviewee").hide();
   $("#"+value+"_cancelApplicantInterviewee").hide();

   $("#"+value+"_grammar").css("border", "1px solid #E0E0E0");
   $("#"+value+"_clarity").css("border", "1px solid #E0E0E0");
   $("#"+value+"_fluency").css("border", "1px solid #E0E0E0");
   $("#"+value+"_development_deliveryOfInfo").css("border", "1px solid #E0E0E0");
   $("#"+value+"_interest").css("border", "1px solid #E0E0E0");
 });

 $(".saveApplicantInterviewee").click(function(event){
   event.preventDefault();
   var value = $(this).attr("value");
   console.log(value);

   if ($("#"+value+"_grammar").val() > 9 ||
   $("#"+value+"_clarity").val() > 9 ||
   $("#"+value+"_fluency").val() > 9 ||
   $("#"+value+"_development_deliveryOfInfo").val() > 9 ||
   $("#"+value+"_interest").val() > 9 ) {
     alert("Input grade must not be greater than 9...");
   }

   if ($("#"+value+"_grammar").val() !== "" &&
   $("#"+value+"_clarity").val() !== "" &&
   $("#"+value+"_fluency").val() !== "" &&
   $("#"+value+"_development_deliveryOfInfo").val() !== "" &&
   $("#"+value+"_interest").val() !== ""
 ) {

   $.ajax({
     url: "interviewResult.php",
     type: "POST",
     dataType: "json",
     data: {
       id: value,
       grammar: $("#"+value+"_grammar").val(),
       clarity: $("#"+value+"_clarity").val(),
       fluency: $("#"+value+"_fluency").val(),
       developmentDeliveryOfInfo: $("#"+value+"_development_deliveryOfInfo").val(),
       interest: $("#"+value+"_interest").val()
     },
     success: function(data){
       console.log(data);
       if (data.insert === "success") {
         $("#"+value+"_grammar").val('');
         $("#"+value+"_clarity").val('');
         $("#"+value+"_fluency").val('');
         $("#"+value+"_development_deliveryOfInfo").val('');
         $("#"+value+"_interest").val('');
          window.location.replace("http://localhost/online-application/admin/");
       }

     },
     error: function(err){
       alert(err);
     }
   });


 }else{
   $("#"+value+"_grammar").css("border", "1px solid red");
   $("#"+value+"_clarity").css("border", "1px solid red");
   $("#"+value+"_fluency").css("border", "1px solid red");
   $("#"+value+"_development_deliveryOfInfo").css("border", "1px solid red");
   $("#"+value+"_interest").css("border", "1px solid red");
 }
 });


 $("#doneInterview").click(function(event){
   event.preventDefault();
   $("#for-interview").show();
   $("#back-home").hide();
   $(".interviewer-container").hide();
   $(".view-applicant").hide();
   $(".printable-form-container-admin").hide();
   $(".buttonPrint").hide();
   $(".view-qualified").hide();
   $("#tbl-nameOfSchoolAttended tbody tr").remove();
   $("#tbl-characterReference tbody tr").remove();
   $(".view-doneInterview").show();
   $(".view-qualified").hide();
 });

 $("#for-interview").click(function(event){
   event.preventDefault();
   $("#for-interview").show();
   $("#back-home").hide();
   $(".interviewer-container").show();
   $(".view-applicant").show();
   $(".printable-form-container-admin").hide();
   $(".buttonPrint").hide();
   $(".view-qualified").hide();
   $("#tbl-nameOfSchoolAttended tbody tr").remove();
   $("#tbl-characterReference tbody tr").remove();
   $(".view-doneInterview").hide();
   $(".view-qualified").hide();
 });

 $("#listQualified").click(function(){
   $("#for-interview").show();
   $("#back-home").hide();
   $(".interviewer-container").hide();
   $(".view-applicant").hide();
   $(".printable-form-container-admin").hide();
   $(".buttonPrint").hide();
   $("#tbl-nameOfSchoolAttended tbody tr").remove();
   $("#tbl-characterReference tbody tr").remove();
   $(".view-doneInterview").hide();
   $(".view-qualified").show();
 });

 $(".btn-getQualifiedDoneInterview").click(function(){
   var value = $(this).attr("value");
   console.log(value);

   $.ajax({
     url: "getQualified.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value,
       office: $("#office").val()
     },
     success: function(data){
       console.log(data);
       location.reload(true);
     },
     error: function(err){
       alert(err);
     }
   });
 });

 $(".btn-notQualifiedDoneInterview").click(function(){
   var value = $(this).attr("value");
   console.log(value);

   $.ajax({
     url: "notQualified.php",
     type: "POST",
     dataType: "json",
     data:{
       id: value,
       office: $("#office").val()
     },
     success: function(data){
       console.log(data);
       location.reload(true);
     },
     error: function(err){
       alert(data);
     }
   });
 });





});
