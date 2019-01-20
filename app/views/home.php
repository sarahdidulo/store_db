<?php require_once '../partials/template.php' ?>

<?php function get_page_content () { 

	//if user is set, go to home page, else, go to login.
	?>

	<?php //echo $_SESSION['user']['username']; ?>

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

			<div class = "logo col-sm-3">
				<img src = "../assets/images/plate.png">
				<p class = "logo_title">CHOWDOWN</p>
				<p class = "logo_desc text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>

		
	</div>



<?php }; ?>