<?php
session_start();
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
      <a href="adminDashboard.php" >
        <i class="fas fa-chart-pie"></i>
        <span>Statistics</span>
      </a>
      <a href="adminDashboardUpload.php">
        <i class="fas fa-upload"></i>
        <span>Upload Data</span>
        </a>
        <a href="adminDashboardDelete.php" class="active">
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
      <br>
      <br>
      <br>
      <br>
     
      <a href="logoutAdmin.php">
        <i class="fas fa-redo-alt"></i>
        <span>Logout</span>
      </a>
    </div>

    <div id="map"></div>
    
</body>
</html>
