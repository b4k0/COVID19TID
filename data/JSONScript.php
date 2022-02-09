<!DOCTYPE html>
<html>

<head>
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
	</script>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>

	<style>
		.box {
			width: 750px;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-top: 100px;
		}
	</style>
</head>

<body>
	<div class="container box">
		<h3 text-align="center">
			Geeks for Geeks Import JSON
			data into database
		</h3><br />
		
		<?php
		
			// Server name => localhost
			// Username => root
			// Password => empty
			// Database name => test
			// Passing these 4 parameters
			$connect = mysqli_connect("localhost", "root", "", "covid19");
			
			$query = '';
			$table_data = '';
			
			// json file name
			$filename = "starting_pois.json";
			
			// Read the JSON file in PHP
			$data = file_get_contents($filename);
			
			// Convert the JSON String into PHP Array
			$array = json_decode($data, true);
			
			// Extracting row by row
			foreach($array as $row) {

				// Database query to insert data
				// into database Make Multiple
				// Insert Query
				$query .=
				"INSERT INTO pois VALUES
				('".$row["name"]."', '".$row["gender"]."',
				'".$row["subject"]."'); ";
			
				$table_data .= '
				<tr>
					<td>'.$row["name"].'</td>
					<td>'.$row["gender"].'</td>
					<td>'.$row["subject"].'</td>
				</tr>
				'; // Data for display on Web page
			}

			if(mysqli_multi_query($connect, $query)) {
				echo '<h3>Inserted JSON Data</h3><br />';
				echo '
				<table class="table table-bordered">
				<tr>
					<th width="45%">Name</th>
					<th width="10%">Gender</th>
					<th width="45%">Subject</th>
				</tr>
				';
				echo $table_data;
				echo '</table>';
			}
		?>
		<br />
	</div>
</body>

</html>
