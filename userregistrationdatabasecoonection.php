<?php include("config\connection.php"); ?>
<?php 
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$sql1 = "SELECT * FROM userdata WHERE email='".$email."'";
$result1 =  mysqli_query($con,$sql1);
if($result1->num_rows>0){
  // echo "email_exit";
  echo json_encode(array("type"=>"allready_register","msg" => "This email allready exit."));
}
else{
    $sql="INSERT INTO `userdata`(`username`, `email`, `password`, `dob`) VALUES ('".$username."','".$email."','".$password."','".$dob."')";
    if(mysqli_query($con,$sql)){  
      // echo  "success";
      echo json_encode(array("type"=>"success","msg" => "Your Registration successfully."));
    }

}

?>