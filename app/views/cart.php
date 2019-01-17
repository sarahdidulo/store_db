<?php require_once '../partials/template.php' ?>


<?php require_once '../controllers/connect.php' ?>

<?php function get_page_content ()  { 

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 2){	

	global $conn; 

	?>



	<div class = "container my-4">
		<div class = "row">
			<div class = "col-12">
				
				<h1>Cart Page</h1>

			</div>
		</div> <!-- end of row -->

		<hr>

		<div class = "table-responsive">
			<table class = "table table-striped table-bordered">
				<thead>
					<tr class = "text center">
						<th>Item Name</th>
						<th>Item Price</th>
						<th>Item Quantity</th>
						<th>Item Subtotal</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0){
							// echo "may laman ang cart";

							$cart_total = 0;

							foreach($_SESSION['cart'] as $id => $qty){
								$sql = "SELECT * FROM items WHERE id = '$id'"; // try to code if $sql is outside foreach
								$result = mysqli_query($conn, $sql);
								$item = mysqli_fetch_assoc($result);

								$subtotal = $_SESSION['cart'][$id] * $item['price'];
								$cart_total += $subtotal;
							
						//dont close if condition here yet so hat code will execute
					?>

					<tr">
						<td class = "item_name"> <?php echo $item['name']; ?> <!-- Item Name  --></td>
						<td class = "item_price"> <?php echo $item['price']; ?> <!-- Item Price --> </td>
						<td class = "item_quantity"> 
							<input type = "number" value = "<?php echo $qty; ?>" class = "form-control" data-id = "<?php echo $id; ?>" min = "1">
						</td>
						<td class = "item_subtotal"> <?php echo $subtotal;?> </td> <!-- dont put any strrings within echo to avoid error in value.  -->
						<td class = "item_action text-center"> 
							<button class = "btn btn-danger item-remove" data-id="<?php echo $id; ?>"> Remove from cart</button>
						</td>
					</tr>

				<?php } ?>  <!-- end of foreach. for every iteration, $subtotal is updated --> 

				</tbody>

				<tfoot>
					<tr>
						<td class = "text-right font-weight-bold" colspan = "3"> Total </td>

						<td class = "text-right font-weight-bold" id = "total_price">  <?php echo $cart_total; ?></td>
						<td class = "text-center">
							<a href = "./checkout.php" class = "btn btn-primary"> Proceed to checkout </a>
						</td>
					</tr>
				</tfoot>


				<?php 
					} else {
						echo '<tr>
								<td class = "text-center" colspan="6"> No Items in the cart </td>
							</tr>';
					}

				?>

			</table>
		</div> <!-- end of table responsive -->

	</div> <!-- end of container -->


<?php } else {

	header('location: ./error.php');

	} ?>

	




<?php } ?>






