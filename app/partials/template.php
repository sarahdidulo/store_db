<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Store</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">	

	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- external css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	<!-- jquery -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- bootstrap js -->

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  	<!-- fonts -->

 	<link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">


</head>
<body>

	<?php 
		require_once 'header.php';
		require_once '../controllers/connect.php';
	 ?>

	 <?php 

	 	get_page_content();

		// mysqli_close($conn);
	  ?>

<?php require_once 'footer.php'; ?>

</body>
</html>
	
