
<?php include("..\config\connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">

</head>
<body>

      <form class="d-flex" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search" style="height:40px; width:200px; border-radius:10px;">
        <button class="btn btn-outline-success" name='search_submit' type="submit" style="height:40px; width:100px;border-radius:10px;">Search</button>
      </form>
      <?php
      if(isset($_POST['search_submit'])){
        $sql = "SELECT * FROM userdata WHERE username LIKE '%{$_POST['search']}%'";
        $result = mysqli_Query($con,$sql);
      }
      ?>
      <br>
      <br>
      <table border="1px solid " cellpadding="8" cellpadding="4">
        <tr>
          <th>S.NO.</th>
          <th>USER NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>DOB</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
           <td><?php if(isset($row['id'])){ echo $row['id'];}?></td>
            <td><?php if(isset($row['username'])){ echo $row['username'];}?></td>
            <td><?php if(isset($row['email'])){ echo $row['email'];}?></td>
            <td><?php if(isset($row['password'])){ echo $row['password'];}?></td>
            <td><?php if(isset($row['dob'])){ echo $row['dob'];}?></td>

            </tr>
            <?php
          }
        }
        else{
   echo "यह नाम किसी उपयोगकर्ता को नहीं मिला/NO USER FOUND.PLZZ ENTERY USER NAME ";
        }
        ?>

      </table>  

</body>
</html>