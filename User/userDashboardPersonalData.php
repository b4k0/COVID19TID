<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>
        <!-- Database Connection and Query -->
        <?php
    // Database Settings
    include "dbinfo.php";

     // Connecto to DB
     $conn=new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
     if($conn->connect_errno ){
         echo "<p class='errMsg'>Couldn't connect to DB server. " . $conn->connect_errno ."</p>\n";
         // Exit PHP and end HTML
         exit();
     }


        $username = $_SESSION["username"];
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
       
    
    ?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID User</title>
    <link rel="stylesheet" type="text/css" href="pdata.css">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class='box'>
      <h4 class="display-5 text-center">Personal Data</h4>
      <br>
      <?php if (mysqli_num_rows($result)) {
      ?>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usename</th>
              <th scope="col">Password</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $i=0;
              while($rows = mysqli_fetch_assoc($result)){
              $i++;
            ?>
            <tr>
              <th scope="row"><?=$i?></th>
              <td><?=$rows['username']?></td>
              <td><?=$rows['password']?></td>
              <td><?=$rows['email']?></td>
              <td><a href='userDashboardUpdate.php?id=<?=$rows['username']?>'
                  class="btn btn-warning">Update</button></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php } ?>
  </div>
      
  


    
</body>
</html>



      </div>
  </div> 
</body>
</html>


