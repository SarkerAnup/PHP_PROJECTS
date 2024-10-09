<?php

session_start();

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


if (isset($_GET['id']) && $_GET['id'] != "") {

	$id = $_GET['id'];

	// Prepare the SQL statement
	$sql = "SELECT * FROM students Where id = " . $id;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();
		$data_student = $row;
	}
} else {

	echo "Something went wrong !!!!";
}

// echo "<pre>";
// print_r($data_student);

if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'update') {

	// echo "<pre>";
	// print_r($_POST);

	$id    = mysqli_real_escape_string($conn, $_POST['id']);
	$name  = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$date  = date("Y-m-d", strtotime($_POST['date'])); // Or however you need to format the date

	$sql_update = "UPDATE students SET name='$name',email='$email',phone='$phone',date='$date' WHERE id=" . $id;

	if ($conn->query($sql_update) === TRUE) {

		// echo "Updated successfully";
		$_SESSION['update_msg'] = "Updated successfully";

		header("Location:read_data.php");
	} else {

		echo "Something went wrong !!!";
	}
}


?>

<html>

<body>

	<form method="POST" action="">
		Name: <input type="text" name="name" value="<?php echo $data_student['name']; ?>">
		<br><br>

		Email: <input type="email" name="email" value="<?php echo $data_student['email']; ?>">
		<br><br>

		Phone: <input type="text" name="phone" value="<?php echo $data_student['phone']; ?>">
		<br><br>

		Date: <input type="date" name="date" value="<?php echo $data_student['date']; ?>">
		<br><br>

		<input type="hidden" name="id" value="<?php echo $data_student['id']; ?>">

		<input type="submit" name="submit" value="update">
	</form>

</body>

</html>