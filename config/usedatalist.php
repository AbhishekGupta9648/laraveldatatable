<?php include("..\config\connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <style>
    table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
  <title></title>
  <center><h2>USER DATA</h2></center>
</head>
<?php

$result=$con->query("SELECT * FROM `userdata` ");
if($result->num_rows>0){
  ?>
  <table border="4">
    <tr>
      <th>id</th>
     <th>Username</th>
     <th>Email</th>
     <th>Password</th>
     <th>Dob</th>
     
     <th colspan="2">ACTION</th>
    </tr>
    <tbody>
       <tr>
    <?php
    // OUTPUT DATA OF EACH ROW
  while($row = $result->fetch_assoc()) { //Start While Loop
?>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['password'];  ?></td>
          <td><?php echo $row['dob'];  ?></td>
          
           <button> <td style="color:red;background-color:orange;"><a href="schoolstudentdataupdate.php?id=<?php echo $row['id'];?>">UPDATE</a></td></button>
          <td style="color:green;background-color:skyblue;"><a href="scholldatadelete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
          </td>
      </tr>
 <?php } //End  While Loop ?>
    </tbody>
  </table>
<?php } ?>
<body>
  
</body>

</html>