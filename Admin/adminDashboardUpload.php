<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>


<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styleAdmin.css">
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
      <a href="adminDashboard.php" >
        <i class="fas fa-chart-pie"></i>
        <span>Statistics</span>
      </a>
      <a href="adminDashboardUpload.php" class="active">
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
    <?php
	      $conn = new PDO("mysql:host=localhost;dbname=covid19", 'root', '');
        if(isset($_POST['buttomImport'])) {
          copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/'.$_FILES['jsonFile']['name']);
          $data = file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
        

          $products = json_decode($data);
          foreach ($products as $product) {
              $stmt = $conn->prepare('insert into pois(`id`, `name`, `address`, `types`, `lat`, `lng`, `rating`, `rating_n`, `current_popularity`, `time_spent`) values(:id, :name, :address, :types, :lat, :lng, :rating, :rating_n, :current_popularity, :time_spent)');
              $stmt->bindValue('id', $product->id);
              $stmt->bindValue('name', $product->name);
              $stmt->bindValue('address', $product->address);
              $stmt->bindValue('types', $product->types);
              $stmt->bindValue('lat', $product->lat);
              $stmt->bindValue('lng', $product->lng);
              $stmt->bindValue('rating', $product->rating);
              $stmt->bindValue('rating_n', $product->rating_n);
              $stmt->bindValue('current_popularity', $product->current_popularity);
              $stmt->bindValue('time_spent', $product->time_spent);
              $stmt->execute();
          }
        }    
    ?>
    
    <div id="card"> 
      <h4>Upload POIs</h4>
      <br>
      <br>
      <form method="post" enctype="multipart/form-data">
			JSON File <input type="file" name="jsonFile">
			<br>
			<input type="submit" value="Import" name="buttomImport">
		</form>
</div>
</div> 
</body>
</html>
