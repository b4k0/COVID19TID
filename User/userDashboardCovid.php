<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
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
      <h4 class="display-5 text-center">Add Covid Inflection</h4>
      <br>
      <?php if (isset($_GET['error'])){ ?>
        <div class="alert alert-danger" role="alert">
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
        <label>Enter Date of Covid inflection</label>
        <input type="text" class="form-control" id="date" name="date" placeholder="Date Format: yyyy-mm-dd">
      </div>
      <br>
      <button type="submit" class="btn btn-success" name="add">Submit</button>
      <a href="userDashboard.php" class="btn btn-danger " role="button">Back</a>
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
      $date = validate($_POST['date']);

     


      // echo $userdate;

      if(empty($date)){
        header("Location: userDashboardCovid.php?error=Date can not be blank!");
      }else if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
        header("Location: userDashboardCovid.php?error=Date is not in the correct format!");
      }else if(strtotime($date) < strtotime('-14 days')){
        header("Location: userDashboardCovid.php?error=Date is not over 14 days before covid inflection!");
      }else if(strtotime($date) < strtotime('+14 days')){
        header("Location: userDashboardCovid.php?error=Date is not over 14 days after covid inflection!");
      }
      else{
        $sql = "INSERT INTO covid(user,diagnosis) VALUES('$username', '$date')";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location: userDashboardCovid.php?success=Covid Inflection added successfully!");
        }
      }
     }

    
    ?>
  </div>
      
  


    
</body>
</html>


