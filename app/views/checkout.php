<?php require_once './../partials/template.php' ?>

<?php function get_page_content() {

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 2){

	global $conn;

?>

	<form method = "POST" action="../controllers/placeorder.php">
		<div class = "container mt-4">
			<div class = "row">
				<h1>Hello, welcome to your checkout page</h1>
				<div class = "col-8 my-5">
					<h4>Shipping Address</h4>
					<div class = "form-group">
						<input type = "text" class = "form-control" name = "addressLine1" value = "<?php echo $_SESSION['user']['address'];?>">
					</div>
				</div>

				<div class = "col-sm-4 my-5">
					<h4>Payment Methods</h4>
					<select name = "payment_modes" id = "payment_mode" class = "form-control">
						<?php

						$payment_mode_query = "SELECT * FROM payment_modes";

						$payment_modes = mysqli_query($conn, $payment_mode_query);

						foreach($payment_modes as $payment_mode){
							extract($payment_mode);

							echo '<option value = '. $id .'>'. $name .' </option>';
						}

						?>
					</select>
				</div>

			</div>

			<div class = "row">
				<h4>Order Summary</h4>
				<div class = "col-sm-6">
					
				</div>

				<div class = "col-sm-6" id = "total_price">
				
				<?php

					$cart_total = 0;

					foreach($_SESSION['cart'] as $id => $qty){
						$sql = "SELECT * FROM items WHERE id = 	$id";

						$result = mysqli_query($conn, $sql);
						$item = mysqli_fetch_assoc($result);
						$subTotal = $_SESSION['cart'][$id] * $item['price'];

						$cart_total += $subTotal;
					}

					echo '<p>Total: &nbsp&nbsp ' . $cart_total . '</p>' ;

				?>

				</div> 
			
			</div> <!-- end of row -->

			<hr>

			<button type = "submit" class = "btn btn-primary btn-block">Place Your Order Now</button>

			<div class = "row cart-items m-5">
				<div class = "table-responsive">
					<table class = "table table-striped table-bordered " id = "cart-items">
						<thead>
							<tr class = "text-center">
								<th colspan = "2"> Item Name </th>
								<th>Item Price </th>
								<th>Item Quantity </th>
								<th>Item Subtotal </th>
							</tr>
						</thead>

						<tbody>

							<?php 

								foreach($_SESSION['cart'] as $id => $qty){
									$sql2 = "SELECT * FROM items WHERE id = $id;";
									$result = mysqli_query($conn, $sql2);
									$item = mysqli_fetch_assoc($result);
									// var_dump($item);
								

							?>
							<tr>
								<td colspan="2"> <?php echo $item['name']; ?></td> <!-- we can already get the values after fetch -->
								<td> <?php echo $item['price']; ?></td>
								<td> <?php echo $qty; ?></td>
								<td><?php echo $qty * $item['price']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
				</div>
			</div>


		</div>
		
	</form>

<? } else {




	header('location: ./error.php');

} ?>







<?php } ?> <!-- end of function -->