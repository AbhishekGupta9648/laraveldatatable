<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation in HTML | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 10px;
  min-height: 100vh;
  background: #1BB295;
}

form {
  padding: 25px;
  background: #fff;
  max-width: 500px;
  width: 100%;
  border-radius: 7px;
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
}

form h2 {
  font-size: 27px;
  text-align: center;
  margin: 0px 0 30px;
}

form .form-group {
  margin-bottom: 15px;
  position: relative;
}

form label {
  display: block;
  font-size: 15px;
  margin-bottom: 7px;
}

form input,
form select {
  height: 45px;
  padding: 10px;
  width: 100%;
  font-size: 15px;
  outline: none;
  background: #fff;
  border-radius: 3px;
  border: 1px solid #bfbfbf;
}

form input:focus,
form select:focus {
  border-color: #9a9a9a;
}

form input.error,
form select.error {
  border-color: #f91919;
  background: #f9f0f1;
}

form small {
  font-size: 14px;
  margin-top: 5px;
  display: block;
  color: #f91919;
}

form .password i {
  position: absolute;
  right: 0px;
  height: 45px;
  top: 28px;
  font-size: 13px;
  line-height: 45px;
  width: 45px;
  cursor: pointer;
  color: #939393;
  text-align: center;
}

.submit-btn {
  margin-top: 30px;
}

.submit-btn input {
  color: white;
  border: none;
  height: auto;
  font-size: 16px;
  padding: 13px 0;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 500;
  text-align: center;
  background: #1BB295;
  transition: 0.2s ease;
}

.submit-btn input:hover {
  background: #179b81;
}
  </style>
  <body>
    <!-- <form action="userregistrationdatabasecoonection.php" method="post"> -->
      <form id="user_registration" method="POST">
      <h2>User Registration</h2>
      <div class="form-group fullname">
        <label for="fullname">Username</label>
        <input type="text" placeholder="Enter your full name" name="username" id="username" data-for="User Name">
        <span style="color:red;" id="username_error"></span>
      </div>
      <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email address" name="email" data-for="Email Address">
      </div>
      <span style="color:red;" id="email_exit"></span>
      <div class="form-group password">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" data-for="Password">
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      </div>
      <div class="form-group password">
        <label for="password">Confirm Password</label>
        <input type="password" id="cpassword" placeholder="Enter your confirm password"  data-for="Confirm Password">
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      </div>
      <div class="form-group date">
        <label for="date">Birth Date</label>
        <input type="date"  placeholder="Select your date" name="dob" id="dob" data-for="Birth Date">
      </div>
      
      <div class="form-group submit-btn">
        <!-- <input type="button" id='user_registration_btn'> -->
        <!-- <button id="user_registration_btn" class="btn btn-primary">Submit</button> -->
        <button type="submit">Submit</button>
      </div>
    </form>

    <script src="script.js"></script>
    <script>
      $(document).ready(function(){
        $('#user_registration').submit(function(event){
          event.preventDefault();
          success = true;
          $('.error').html('');
          $("#username,#email, #password, #dob,#cpassword").each(function() {
            $(this).css('background-color', '');

            if ($(this).val().replace(/\s+/g, " ").trim() == '') {

              $(this).css('background-color', 'khaki');

              success = false;

              $(this).parent().append("<p style='color:red' class='text text-danger error'>Please Enter " + $(this).data("for")+"</p>")

            }
          });
          if(success==false){
            return success;
          }
          else{
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();
            if(password!= cpassword){
              alert('Password confirm password do not match.');
              return;
            }
            // var form_data = new FormData($('#user_registration')[0]);
            var formData = $(this).serialize();
            var rr="success";
            $.ajax({
              url:'userregistrationdatabasecoonection.php',
              type: 'POST',
              data: formData,
              success:function(response){
                var msgp=JSON.parse(response);
                // alert(msgp.type);
                if(msgp.type=='allready_register'){
                  $('#email_exit').html(msgp.msg);
                }else{
                  alert(msgp.msg);
                  location.reload();
                }
              }
            });
          }
        });
      });
    </script>

  </body>
</html>