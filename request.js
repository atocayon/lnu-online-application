$(document).ready(function() {

  $(function() {
    //First Form
    //Status Checkbox
    $("input[name='status']").click(function() {
      //IF returnee checkbox is checked
      if ($("#checkbox-returnee").is(":checked")) {
        $("#returnee").show();
        $("input[name='passer-radio']").click(function() {
          if ($("#pass-no").is(":checked") || $("#pass-yes").is(":checked")) {
            $("#second-course-preference").change(function() {
              if (
                $("#returnee-month").val() !== "" &&
                $("#returnee-year").val() !== "" &&
                $("#returnee-specify-course").val() !== "undefined" &&
                $("#first-course-preference").val() !== "" &&
                $("#second-course-preference").val() !== ""
              ) {
                $(".form-2").show();
                $(".form-1").hide();
                $(".step-1, #step-1-text").css("color", "green");
                $(".step-1-circle").css("background-color", "#012450");
                $(".step-2, #step-2-text").css("font-weight", "bold");
              } else {
                $(".step-1, #step-1-text").css("color", "#012450");
                $(".step-1-circle").css("background-color", "#fafafa");
                $(".step-2, #step-2-text").css("font-weight", "regular");
              }
            });
          }
        });

        //If new or transferee checkbox is checked
      } else {
        $("#returnee").hide();
        if (
          $("#checkbox-new").is(":checked") ||
          $("#checkbox-transferee").is(":checked")
        ) {
          $("#second-course-preference").change(function() {
            if (
              $("#first-course-preference").val() !== "" &&
              $("#second-course-preference").val() !== ""
            ) {
              $(".form-2").show();
              $(".form-1").hide();
              $(".step-1, #step-1-text").css("color", "green");
              $(".step-1-circle").css("background-color", "#012450");
              $(".step-2, #step-2-text").css("font-weight", "bold");
            } else {
              $(".step-1, #step-1-text").css("color", "#012450");
              $(".step-1-circle").css("background-color", "#fafafa");
              $(".step-2, #step-2-text").css("font-weight", "regular");
            }
          });
        }
      }
    });
  }); //    End First Forms

  //    Second Form
  $(function() {
    $("#contact-no")
      .keyup(function() {
        if ($(this).val().length === 11) {
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
        }
      })
      .keyup();
  });
  //End of Second Form

  //Third Form
  $(function() {
    $("input[name='type-of-school']").click(function() {
      if (
        $("#publicSchool-checkbox").is(":checked") ||
        $("#privateSchool-checkbox").is(":checked")
      ) {


        $("input[name='school-category']").click(function() {
          if (
            $("#religious-school").is(":checked") ||
            $("#non-religious-school").is(":checked")
          ) {

            $("#hobbies-talents-interests")
              .keyup(function() {
                if ($(this).val().length > 0) {
                  console.log("working");
                  if (
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
                    $("#third-school-name").val() !== "" &&
                    $("#third-school-address").val() !== "" &&
                    $("#third-school-level").val() !== "" &&
                    $("#third-school-inclusiveDate").val() !== "" &&
                    $("#third-school-award-received").val() !== "" &&
                    $("#general-weighted-average").val() !== "" &&
                    $("#membership-organization").val() !== ""
                  ) {
                    $(".form-3").hide();
                    $(".form-4").show();
                    $(".step-3, #step-3-text").css("color", "green");
                    $(".step-3-circle").css("background-color", "#012450");
                    $(".step-4, #step-4-text").css("font-weight", "bold");
                  }
                }
              })
              .keyup();
          }
        });
      }
    });
  }); // End of third form

  //Fourth Form
  $(function() {
    $("#btn-submit").click(function(event) {
      event.preventDefault();

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
        }else{
          returneePasser = "undefined";
        }

          $.ajax({
            url: "insert.php",
            type: "POST",
            dataType: "json",
            data: {
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
              secondSchoolInclusiveDate:  [
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
              fourthSchoolName: $("#fourth-school-name").val(),
              fourthSchoolAddress: $("#fourth-school-address").val(),
              fourthSchoolLevel: $("#fourth-school-level").val(),
              fourthSchoolInclusiveDate:[
                fourthSchoolInclusiveDate_year,
                fourthSchoolInclusiveDate_month,
                fourthSchoolInclusiveDate_day
              ].join("-"),
              fourthSchoolAwardReceived: $("#fourth-school-award-received").val(),
              generalWeightedAverage: $("#general-weighted-average").val(),
              membershipOrganization: $("#membership-organization").val(),
              hobbiesTalentsInterest: $("#hobbies-talents-interests").val(),
              firstPersonReferenceName: $("#first-person-reference-name").val(),
              firstPersonReferenceAddress: $("#first-person-reference-address").val(),
              firstPersonReferenceContactNum: $("#first-person-reference-cnum").val(),
              secondPersonReferenceName: $("#second-person-reference-name").val(),
              secondPersonReferenceAddress: $("#second-person-reference-address").val(),
              secondPersonReferenceContactNum: $("#second-person-reference-cnum").val()

            },
            cache: false,
            success: function(data) {
              // if (data.insertApplicant === "success_tblApplicant") {
              //   console.log("success");
              // }else{
              //   console.log("failed");
              // }
              console.log(data.insertApplicant);

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
});
