<?php 
	require './connect.php';

	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];


	$sql = "SELECT * FROM users WHERE username = '$username' ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){ //the username exists already. try if pwede while loop using mysqli_fetch_assoc
		die("user_exists"); // try echo
	} else {	//else add user

		$sql_insert = "INSERT INTO users(username, password, firstname, lastname, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$address'); ";
		$result = mysqli_query($conn, $sql_insert);

	}

	mysqli_close($conn);

	// if($result === TRUE) {
	// 	echo "success";
	// } else {
	// 	echo mysqli_error($conn);
	// }

 ?>
