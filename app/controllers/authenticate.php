<?php

	session_start();

	require_once "./connect.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql =  "SELECT * FROM users WHERE username = $username";
	$result = mysqli_query($conn, $sql);

	$user_info = mysqli_fetch_assoc($result);

	if(!password_verify($password, $user_info['password'])){ //password verify is a php function
		die("login_failed");
	} else {
		$_SESSION['user'] = $user_info;
	}

	echo "login success";




	mysqli_close($conn);

?>