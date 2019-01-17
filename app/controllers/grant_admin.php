<?php require_once './connect.php';

	session_start();

	global $conn;
	
	$id = $_POST['id'];

	$sql = "SELECT * FROM users WHERE id = $id ";

	$result = mysqli_query($conn, $sql);

	//echo $id;

	$row = mysqli_fetch_assoc($result);


	if($row['roles_id'] == 2){ // grant admin
		$sql2 = "UPDATE users SET roles_id = 1 WHERE id = $id ";
		mysqli_query($conn, $sql2);

	} else if ($row['roles_id'] == 1){
		$sql3 = "UPDATE users SET roles_id = 2 WHERE id = $id ";
		mysqli_query($conn, $sql3);
	}

	header('location: ./../views/users.php');


?>

