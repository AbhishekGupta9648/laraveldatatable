<?php include("..\config\connection.php"); ?>
<?php
 $id=$_REQUEST['id'];
 
// print_r($_REQUEST);
if(isset($_POST['submit'])){
  // print_r($_POST);
  // exit;

$sql=$con->query("UPDATE `userdata` SET `username`='".$_POST['username']."' ,email='".$_POST['email']."' WHERE id='".$id."'");
if($sql===TRUE){
 echo "sucess";
}else{
  echo "roor";
} 
}
 // sql query
 $result=$con->query("SELECT * FROM `userdata` WHERE id='".$id."' ");
 $row=$result->fetch_assoc();
 // print_r($row);
 // exit;
?>


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
    

    <form action="" method="post">
      <h2>User Registration</h2>
      <div class="form-group fullname">
        <label for="fullname">Username</label>
       <input type="text" name="username" value="<?php echo $row['username'];?>" placeholder="Enter your name" >
      </div>
      <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="text" id="email" placeholder="Enter your email address" name="email" value="<?php echo $row['email'];?>">
      </div>
      <div class="form-group password">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" value="<?php echo $row['password'];?>" name="password">
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      </div>
      <div class="form-group date">
        <label for="date">Birth Date</label>
        <input type="text" id="date" placeholder="Select your date" name="dob" value="<?php echo $row['dob'];?>">
      </div>
      
      <div class="form-group submit-btn">
        <input type="submit" value="Submit" name="submit">
      </div>
    </form>

    <script src="script.js"></script>
  </body>
</html>