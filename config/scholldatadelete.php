<?php include("..\config\connection.php"); ?>
<?php
$id=$_GET['id'];
$sql="DELETE FROM `userdata` WHERE id='".$id."'";
if(mysqli_Query($con,$sql)){
 echo "sucesss";
}else{
	echo "error";
}
?>
