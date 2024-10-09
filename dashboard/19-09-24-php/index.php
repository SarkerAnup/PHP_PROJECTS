<?php


	
	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'submit'){

		// echo "<pre>";
		// print_r($_POST);
		// exit;

		// var_dump($_POST['date']);
		// $date = date("Y-m-d", strtotime($_POST['date']));

		// var_dump($date);exit;



		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test_php";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// Get user inputs
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$date = date("Y-m-d", strtotime($_POST['date'])); // Or however you need to format the date


		// Prepare the SQL statement
		$sql = "INSERT INTO students (name, date, email, phone) VALUES ('$name', '$date', '$email', '$phone')";


		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";

		  header("Location:read_data.php");
		  
		} else {
		  echo "Error happened !!!";
		}

		$conn->close();

	}

	
	?>

	<html>
	<body>

	<form method="POST" action="">
	  Name: <input type="text" name="name">
	  <br><br>

	  Email: <input type="email" name="email">
	  <br><br>

	  Phone: <input type="text" name="phone">
	  <br><br>

	  Date: <input type="date" name="date">
	  <br><br>

	  <input type="submit" name="submit" value="submit">
	</form>

	</body>
	</html>

	<?php

	?>