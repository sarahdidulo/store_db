<?php require_once './connect.php' ?>
<?php session_start(); ?>

<?php

	$id = $_POST['user_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sql_update = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', address = '$address' WHERE id = $id; ";

	mysqli_query($conn, $sql_update);


	$sql_fetch = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql_fetch);
	$_SESSION['user'] = mysqli_fetch_assoc($result);	
 

	header('Location: ../views/profile.php');



?>