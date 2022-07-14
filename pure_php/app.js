$(document).ready(function () {           
   
    $(function () {
         $("#fname_error_message").hide();
         $("#lname_error_message").hide();
         $("#email_error_message").hide();
         $("#contact_error_message").hide();
         $("#date_error_message").hide();
         $("#password_error_message").hide();
         $("#cpassword_error_message").hide();

         var error_fname = false;
         var error_lname = false;
         var error_email = false;
         var error_contact = false;
         var error_date   = false
         var error_password = false;
         var error_cpassword = false;

         $("#form_fname").focusout(function(){
            check_fname();
         });
         $("#form_lname").focusout(function(){
            check_lname();
         });
         $("#form_email").focusout(function() {
            check_email();
         });
         $("#form_contact").focusout(function() {
            check_contact();
         });
         $("#form_date").focusout(function() {
            check_date();
         });
         $("#form_password").focusout(function() {
            check_password();
         });
         $("#form_cpassword").focusout(function() {
            check_cpassword();
         });

         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            const fname = $("#form_fname").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }
         function check_lname() {
            var pattern = /^[a-zA-Z]*$/;
            const lname = $("#form_lname").val();
            if (pattern.test(lname) && lname !== '') {
               $("#lname_error_message").hide();
               $("#form_lname").css("border-bottom","2px solid #34F458");
            } else {
               $("#lname_error_message").html("Should contain only Characters");
               $("#lname_error_message").show();
               $("#form_lname").css("border-bottom","2px solid #F90A0A");
               error_lname = true;
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            const email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border-bottom","2px solid #F90A0A");
               error_email = true;
            }
         }
         function check_contact() {
            const contact = $("#form_contact").val();
            if (contact !== '' && contact.length == 10) {
               $("#contact_error_message").hide();
               $("#form_contact").css("border-bottom","2px solid #34F458");
            } else {
               $("#contact_error_message").html("Phone number is required");
               $("#contact_error_message").show();
               $("#form_contact").css("border-bottom","2px solid #F90A0A");
               error_contact = true;
            }
         }
         function check_date() {
            const date = $("#form_date").val();
            if (date !== '') {
               $("#date_error_message").hide();
               $("#form_date").css("border-bottom","2px solid #34F458");
            } else {
               $("#date_error_message").html("Date is required");
               $("#date_error_message").show();
               $("#form_date").css("border-bottom","2px solid #F90A0A");
               error_date = true;
            }
         }
         function check_password() {
            const password = $("#form_password").val().length;
            if (password < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
            
         }
         function check_cpassword() {
            var password = $("#form_password").val();
            var cpassword = $("#form_cpassword").val();
            if (cpassword == '' && password == cpassword) {
               $("#cpassword_error_message").html("Passwords did not Matched");
               $("#cpassword_error_message").show();
               $("#form_cpassword").css("border-bottom","2px solid #F90A0A ");
               error_cpassword = true;
            } else {
               $("#cpassword_error_message").hide();
               $("#form_cpassword").css("border-bottom","2px solid #34F458");
            }
         }
         
         

        $("#signup").click(function () {
            error_fname = false;
            error_lname = false;
            error_email = false;
            error_contact = false;
            error_date = false;
            error_password = false;
            error_cpassword = false;

            check_fname();
            check_lname();
            check_email();
            check_contact();
            check_date();
            check_password();
            check_cpassword();

            const fname = $("#form_fname").val();
            const lname = $("#form_lname").val();
            const email = $("#form_email").val();
            const contact = $("#form_contact").val();
            const date = $("#form_date").val();
            const password = $("#form_password").val();
            const cpassword = $("#form_cpassword").val();

            if (error_fname === false && error_lname === false && error_email === false && error_contact === false && error_date === false && error_password === false && error_cpassword === false){

               $.ajax({
                  type: "POST",
                  url: "signup.php",
                  data: { "fname": fname, "lname": lname, "email": email, "contact": contact, "date": date, "password": password },
                  dataType: 'JSON',
                  success: function (feedback) {
                     if (feedback.status === "error") {
                        $("#form_email").addClass("is-invalid");
                        $(".emailError").html(feedback.message);
                     } else if (feedback.status === "success") {
                        window.location = "login.php";
                     }
                  }
               })
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }
        })
    })


    $("#login").click(function () {
        const email = $("#email").val();
        const password = $("#password").val();
        if (email.length == "") {
            $(".email").addClass("is-invalid");
        } else {
            $(".email").removeClass("is-invalid");
        }

        if (password.length == "") {
            $(".password").addClass("is-invalid");
        } else {
            $(".password").removeClass("is-invalid");
        }

        if (email.length != "" && password.length != "") {
            $.ajax({
                type: 'POST',
                url: 'userLogin.php',
                data: { 'email': email, 'password': password },
                dataType: 'JSON',
                success: function (feedback) {
                    if (feedback.status === "success") {
                        window.location = "profile.php";
                    } else if (feedback.status === "passwordError") {
                        $(".password").addClass("is-invalid");
                        $(".passwordError").html(feedback.message);
                        $(".email").removeClass("is-invalid");
                        $(".emailError").html("");
                    } else if (feedback.status === "emailError") {
                        $(".password").removeClass("is-invalid");
                        $(".passwordError").html("");
                        $(".email").addClass("is-invalid");
                        $(".emailError").html(feedback.message);
                    }
                }
            })
        }
    })

    $(function(){

      $("#fname_error_message").hide();
      $("#lname_error_message").hide();
      $("#email_error_message").hide();
      $("#contact_error_message").hide();
      $("#date_error_message").hide();
      $("#password_error_message").hide();

      var error_fname = false;
      var error_lname = false;
      var error_email = false;
      var error_date = false;
      var error_contact = false;
      var error_password = false;

      $("#form_fname").focusout(function(){
         check_fname();
      });
      $("#form_lname").focusout(function(){
         check_lname();
      });
      $("#form_email").focusout(function(){
         check_email();
      });
      $("#form_contact").focusout(function() {
         check_contact();
      });
      $("#form_date").focusout(function(){
         check_date();
      });
      $("#form_password").focusout(function() {
         check_password();
      });

      function check_fname(){
         var pattern = /^[a-zA-Z]*$/;
         const fname = $("#form_fname").val();
         if (pattern.test(fname) && fname !== '') {
            $("#fname_error_message").hide();
            $("#form_fname").css("border-bottom","2px solid #34F458");
         } else {
            $("#fname_error_message").html("Should contain only Characters");
            $("#fname_error_message").show();
            $("#form_fname").css("border-bottom","2px solid #F90A0A");
            error_fname = true;
         }
      }
      function check_lname() {
         var pattern = /^[a-zA-Z]*$/;
         const lname = $("#form_lname").val();
         if (pattern.test(lname) && lname !== '') {
            $("#lname_error_message").hide();
            $("#form_lname").css("border-bottom","2px solid #34F458");
         } else {
            $("#lname_error_message").html("Should contain only Characters");
            $("#lname_error_message").show();
            $("#form_lname").css("border-bottom","2px solid #F90A0A");
            error_lname = true;
         }
      }
      function check_email() {
         var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         const email = $("#form_email").val();
         if (pattern.test(email) && email !== '') {
            $("#email_error_message").hide();
            $("#form_email").css("border-bottom","2px solid #34F458");
         } else {
            $("#email_error_message").html("Invalid Email");
            $("#email_error_message").show();
            $("#form_email").css("border-bottom","2px solid #F90A0A");
            error_email = true;
         }
      }
      function check_contact() {
         const contact = $("#form_contact").val();
         if (contact !== '' && contact.length == 10) {
            $("#contact_error_message").hide();
            $("#form_contact").css("border-bottom","2px solid #34F458");
         } else {
            $("#contact_error_message").html("Phone number is required");
            $("#contact_error_message").show();
            $("#form_contact").css("border-bottom","2px solid #F90A0A");
            error_contact = true;
         }
      }
      function check_date() {
         const date = $("#form_date").val();
         if (date !== '') {
            $("#date_error_message").hide();
            $("#form_date").css("border-bottom","2px solid #34F458");
         } else {
            $("#date_error_message").html("Invalid Email");
            $("#date_error_message").show();
            $("#form_date").css("border-bottom","2px solid #F90A0A");
            error_date = true;
         }
      }
      function check_password() {
         const password = $("#form_password").val().length;
         if (password < 8) {
            $("#password_error_message").html("Atleast 8 Characters");
            $("#password_error_message").show();
            $("#form_password").css("border-bottom","2px solid #F90A0A");
            error_password = true;
         } else {
            $("#password_error_message").hide();
            $("#form_password").css("border-bottom","2px solid #34F458");
         }
      }

      $('#update').click(function(){

       error_fname = false;
       error_lname = false;
       error_email = false;
       error_date = false;
       error_contact = false;
       error_password = false;

         check_fname();
         check_lname();
         check_email();
         check_date();
         check_contact();
         check_password();

         const fname = $("#form_fname").val();
         const lname = $("#form_lname").val();
         const email = $("#form_email").val();
         const date = $("#form_date").val();
         const contact = $("#form_contact").val();
         const password = $("#form_password").val();

         if(error_fname === false && error_lname === false && error_email === false &&  error_date === false && error_contact === false && error_password === false){
             $.ajax({
                type: "POST",
                url: "update.php",
                data: {"fname":fname,"lname":lname,"email":email,"date":date,"contact":contact,"password":password},
                dataType: 'JSON',
                success: function(feedback){
                   if(feedback.status === "success"){
                     window.location = "profile.php";
                   }else if(feedback.status === "error"){
                      $(".up_error").html("Updation failure")
                   }
                  }

             })
         }else{
            alert("All fields are required");
            return false;
         }
         
      })
})

$("#forgotpassform").on('submit', function(e){
   e.preventDefault();

   var email = $("#email").val();
   $.ajax({
      type: "POST",
      url: "forget_pass_in.php",
      data: {email:email},
      success: function(data){
         $(".form-message").css("display","block");
         $(".form-message").html(data);
      }
   })
})
})


