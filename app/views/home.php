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

			<div class = "logo col-sm-3 text-center">
				<img src = "../assets/images/plate.png">
				<p class = "logo_title">CHOWDOWN</p>
				<p class = "logo_desc">Your online food source day or night. We deliver in all parts of the metro. Register now and get your food delivered right on your doorstep!</p>
			</div>

		
	</div>



<?php }; ?>