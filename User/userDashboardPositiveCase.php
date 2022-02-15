<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID User</title>
    <link rel="stylesheet" type="text/css" href="personaldata.css">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<a href="userDashboard.php" class="btn btn-danger" id='back' role="button">Back to Dashboard Page</a>  
 
<div class="container">
              </br>
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
        $sql = "SELECT pois.id,pois.name, visit.visitTime
        FROM visit 
        INNER JOIN pois ON visit.poi=pois.id
        INNER JOIN covid ON visit.visitTime >= covid.diagnosis 
        WHERE visit.visitTime <= DATE_ADD(covid.diagnosis,INTERVAL 7 DAY) AND visit.user='$username' AND visit.user != covid.user ";
        $result = mysqli_query($conn,$sql);
       
    
    ?>

    <div class='box'>
      <h4 class="display-5 text-center">Possible Contact with Positive Cases </h4>
      <br>
      <?php if (mysqli_num_rows($result) > 0) {
      ?>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">POI id</th>
              <th scope="col">POI Name</th>
              <th scope="col">Visit Datetime</th>
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
               <td><?=$rows['id']?></td>
              <td><?=$rows['name']?></td>
              <td><?=$rows['visitTime']?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php } 
      else{
         echo '<script>alert("There are not any prossible contact with positive case")</script>';
      }?>
  </div>
  <br>
  </div>

  
 
</body>
</html>


