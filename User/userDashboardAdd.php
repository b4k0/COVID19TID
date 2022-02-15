<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>
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
   $id=$_GET['id'];
   if(isset($_GET['id'])){


 
    

      $sql = "SELECT * FROM pois WHERE id='$id'";
      $result = mysqli_query($conn,$sql);
      if( mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
      }
    }
   
    

?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID User</title>
    <link rel="stylesheet" type="text/css" href="covid.css">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
  <form method="POST">
      <h4 class="display-5 text-center">Add Visit</h4>
      <br>

      <?php if (isset($_GET['error'])){ ?>
        <div class="alert alert-error" role="alert">
        <?php echo $_GET['error']; ?>
        </div>
		    <?php } ?>
        <?php if (isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
        </div>
		    <?php } ?>
        
        
      
      <br>
      <div class="form-group">
        <label>User</label>
        <input class="form-control" id="disabledInput" type="text" value='<?=$username?>' disabled>
      </div>
      <div class="form-group">
        <label>POI id</label>
        <input type="text" class="form-control" id="disabledInput" name='poi' value='<?=$row['id']?>'disabled>
      </div>
      <br>
      <button type="submit" class="btn btn-success" name="add">Add Visit</button>
      <a href="userDashboardVisit.php" class="btn btn-danger " role="button">Back</a>
  </form>
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
        

     if(isset($_POST['add'])){
      function validate($data){
        $data = trim($data);
        return $data;
      }

      $username = $_SESSION["username"];
      $poiid = $row['id'];

      if(empty($poiid)){
        header("Location: userDashboardAdd.php?error=POI id can not be blank!");
      }else
      {
          $sql = "INSERT INTO visit (user,poi,visitTime) VALUES ('$username','$poiid',CURRENT_TIMESTAMP())";
          $result = mysqli_query($conn,$sql);
          header("Location: userDashboardAdd.php?success=Visit added successfully!");
    }
  }

    ?>
  </div>
      
  


    
</body>
</html>


