<?php


	// $id = $_GET['id'];
	// echo $id;

	$data_student = null;
	
	// Database connectin script start

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

	// Database connectin script end


	if(isset($_GET['id']) && $_GET['id'] != ""){

		$id = $_GET['id'];

		// Prepare the SQL statement
		$sql = "SELECT * FROM students Where id = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();
		    $data_student = $row;
		}


	}else{

		echo "Something went wrong !!!!";
	}


?>