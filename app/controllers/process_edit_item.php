<?php 

	session_start();

	require_once './connect.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id']; //name of tag

	$sql = "UPDATE items SET name = '$name', description = '$description', price = '$price', category_id = '$category_id' WHERE id = '$id' ; ";

	$result = mysqli_query($conn, $sql);

	mysqli_close($result);

	header('location: ../views/items.php');


?>