<?php

session_start();

$data_students = null;

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


// Prepare the SQL statement
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	// Fetch all rows as an associative array
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$data_students = $rows;
} else {

	echo "Error happened !!!";
}


// $array_test = ["one" => 'test', "two" => 50, "dfdf" => "Volvo"];



// echo "<pre>";
// print_r($data_students);
// echo "<br>";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dynamic Data</title>
</head>

<body>

	<h1>
		<?php
		if (isset($_SESSION['update_msg']) && $_SESSION['update_msg'] != "") {

			echo $_SESSION['update_msg'];

			unset($_SESSION['update_msg']);
		}
		?>
	</h1>

	<table border="1">

		<tr>
			<th>Name</th>
			<th>email</th>
			<th>phone</th>
			<th>date</th>
			<th>Action</th>
		</tr>

		<?php

		foreach ($data_students as $key => $row) { ?>

			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td>
					<a href="<?php echo 'edit.php?id=' . $row['id']; ?>">Edit</a>
					<a onclick="confirm('Are you sure?');" href="<?php echo 'delete.php?id=' . $row['id']; ?>">Delete</a>
				</td>
			</tr>

		<?php }
		?>



	</table>

</body>

</html>