<?php
session_start();
?>
<?php
    error_reporting(E_ALL ^ E_WARNING);
    $keyword = isset($_POST["poi_keyword"])?$_POST["poi_keyword"]:"";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>COVID19 TID User</title>
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css"  href="myvisit.css"/>
        <!-- Responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    </head>
    <body>
    <a href="userDashboard.php" class="btn btn-danger" id='back' role="button">Back to Dashboard Page</a>  
  <div class="container">
  <br>
  <h4 class="display-8 text-center">Search POIs</h4>
    <br>
  <form method="POST" class="form-inline" action="">
      <div class="form-group mx-sm-3">
        <input class="form-control" type="text" name="poi_keyword" value='' placeholder="Enter a keyword...">
        </div>
        <button type="submit" class="btn btn-primary" id='find'>Search</button>
  </form>

  <br>
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
        $clean_keyword = $conn->real_escape_string($keyword);

         //SQL Syntax
        $sql = "SELECT * FROM pois WHERE name LIKE '%".$clean_keyword."%' OR address LIKE '%".$clean_keyword."%' OR rating LIKE '%".$clean_keyword."%' GROUP BY name ASC";

        //Execute SQL
        $result = mysqli_query($conn,$sql);
       
    
    ?>

    <div class='box'>
      <h4 class="display-5 text-center">POI(s)</h4>
      <br>
      <?php if (mysqli_num_rows($result)) {
      ?>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Rating</th>
              <th scope="col">Langitude</th>
              <th scope="col">Longitude</th>
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
              <td><?=$rows['name']?></td>
              <td><?=$rows['address']?></td>
              <td><?=$rows['rating']?></td>
              <td><?=$rows['lat']?></td>
              <td><?=$rows['lng']?></td>
              <td><a href='userDashboardAdd.php?id=<?=$rows['id']?>'
                  class="btn btn-warning" >Add Visit</button></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php } 
  ?>
  </div>
</div>
    </body>
    
    
</html>