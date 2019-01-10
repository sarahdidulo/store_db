<?php

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