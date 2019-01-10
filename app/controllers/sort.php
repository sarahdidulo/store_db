<?php
session_start();

if(isset($_GET['sort'])){
	if($_GET['sort'] == "asc"){
		$_SESSION['sort'] = 'ASC';
	} else {
		$_SESSION['sort'] = 'DESC';
	}
}



// header('location: ../views/catalog.php');

header("Location: " . $_SERVER["HTTP_REFERER"]);


?>