<?php
session_start();
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styledashboardAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
</head>
<body>

   
    <div class="sidebar">
      <p>COVID 19 TID</p>
      <header>
        <i class="fas fa-user-shield"></i>
        <?php echo $_SESSION["username"]?>
      </header>
      <br>
      <a href="adminDashboard.php" class="active">
        <i class="fas fa-chart-pie"></i>
        <span>Statistics</span>
      </a>
      <a href="adminDashboardUpload.php">
        <i class="fas fa-upload"></i>
        <span>Upload Data</span>
        </a>
        <a href="adminDashboardDelete.php">
        <i class="fas fa-trash-alt"></i>
        <span>Delete Data</span>
        </a>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
     
      <a href="logoutAdmin.php">
        <i class="fas fa-redo-alt"></i>
        <span>Logout</span>
      </a>
    </div>

    <div id="map">
          <div class="row">
          <div class="col-sm-6" >
            <div class="card text-dark bg-light mb-3" style="width: 20rem; height: 12rem;">
            <div class="card-header">Visits</div>
              <div class="card-body">
                <h5 class="card-title  text-center">Total Visits</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                   $sql = "SELECT COUNT(*) FROM visit";
                   $result = mysqli_query($conn,$sql);
                   $row = mysqli_num_rows($result);

                   echo '<h1 class="card-text text-center">  '.$row.'</h1>';

                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="card text-light bg-danger mb-3" style="width: 20rem; height: 12rem;">
            <div class="card-header">Total Covid Inflections</div>
              <div class="card-body">
                <h5 class="card-title text-center">Covid Inflections</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                   $sql = "SELECT DISTINCT COUNT(*) FROM covid";
                   $result = mysqli_query($conn,$sql);
                   $row = mysqli_num_rows($result);

                   echo ' <h1 class="card-text text-center"> '.$row.'</h1>';

                ?>
              </div>
            </div>
          </div>
    </div>




    </div>
    
</body>
</html>
