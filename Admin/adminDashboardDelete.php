<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styleAdmindelete.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


    <div class="sidebar">
      <p>COVID 19 TID</p>
      <header>
        <i class="fas fa-user-shield"></i>
        <?php echo $_SESSION["username"]?>
      </header>
      <br>
      <a href="adminDashboard.php">
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

      <a href="logoutAdmin.php">
        <i class="fas fa-redo-alt"></i>
        <span>Logout</span>
      </a>
    </div>

    <div class="container">
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
        $sql = "SELECT * FROM pois";
        $result = mysqli_query($conn,$sql);
       
    
    ?>
           
      <div class="box">
      <div class="col-md-10 text-right">
      <h4 class="display-4 text-right">POIs</h4>
      <br>
      <a href="deleteall.php"class="btn btn-danger text-right">Delete All</a>
      </div>
      <br>
      <?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-warning text-center" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
      <?php if (mysqli_num_rows($result)) {
      ?>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Latitude</th>
              <th scope="col">Longtitude</th>
              <th scope="col">Rating</th>
              <th scope="col">Popularity</th>
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
              <td><?=$rows['id']?></td>
              <td><?=$rows['name']?></td>
              <td><?=$rows['address']?></td>
              <td><?=$rows['lat']?></td>
              <td><?=$rows['lng']?></td>
              <td><?=$rows['rating']?></td>
              <td><?=$rows['current_popularity']?></td>
              <td><a href="delete.php?id=<?=$rows['id']?>"
                  class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php } ?>
  </div>
</div>
</div>    
</div>



    
</body>
</html>
