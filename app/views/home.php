<?php require_once '../partials/template.php' ?>

<?php function get_page_content () { 

	if(isset($_SESSION['user'])){
	?>

	<div class = "row homebg no-gutters">
		
			<!-- <div id = "jumbo" class = "jumbotron">
				<p>Store</p>
				<small>Your favorite store</small>
			</div> -->
			<div class = "card">
				<div class = "card1">
					<p>40% OFF ON DELIVERY CHARGE ON STAR MEMBERS</p>
				</div>
			</div>
			

			<a href = "./catalog.php">
				<div class = "card">
					<div class = "card2">
						<p>View Catalog</p>
					</div>
				</div>
			</a>

			<div class = "logo col-sm-3 text-center">
				<img src = "../assets/images/plate.png">
				<p class = "logo_title">CHOWDOWN</p>
				<p class = "logo_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>

		
	</div>

<?php } else { 

	header('location: ./login.php');

	} ?>




<?php }; ?>