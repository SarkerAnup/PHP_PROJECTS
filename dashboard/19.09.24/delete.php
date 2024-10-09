<?php

session_start();

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


if (isset($_GET['id']) && $_GET['id'] != "") {

	$id = $_GET['id'];

	// Prepare the SQL statement
	$sql = "DELETE FROM students Where id = " . $id;
	$result = $conn->query($sql);

	if ($conn->affected_rows > 0) {

		// echo "Updated successfully";
		$_SESSION['update_msg'] = "Deleted successfully";

		header("Location:read_data.php");
	}
} else {

	echo "Something went wrong !!!!";
}
