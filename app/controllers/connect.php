<?php

// $host = "db4free.net";
// $username = "sarahdidulo11";
// $password = "testpass11";
// $dbname = "cakestore_db";

$host = "localhost";
$username = "root";
$password = "";
$dbname = "ecom_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	echo "Connection error: ". mysqli_error($conn);
} else {
	// echo "connected sucessfully";
}