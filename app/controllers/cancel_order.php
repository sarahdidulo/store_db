<?php require_once './connect.php';

	session_start();

	global $conn;

	$order_id = $_POST['order_id'];

	$sql = "UPDATE orders SET status_id = 3 WHERE id = $order_id";

	mysqli_query($conn, $sql);


?>