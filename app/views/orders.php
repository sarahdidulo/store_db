<?php require_once '../partials/template.php' ?>

<?php function get_page_content () { 

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {

		global $conn;

		$user_name = $_SESSION['user']['username'];

	?>

		<div class = "order_bg row">
			<div class = "orders col-sm-8 offset-sm-2">
				<h4>Orders Admin Page : <?php echo $user_name ;?></h4>
				<table class = "order_table table table-striped">
					<thead>
						<th>Purchase Date</th>
						<th>Transaction Code</th>
						<th>Status</th>
						<th>Total</th>
						<th>Actions</th>
					</thead>

					<tbody>
						<?php

						$id = $_SESSION['user']['id'];


							$order_query = "SELECT o.id, o.purchase_date, o.transaction_code, o.status_id, s.name FROM orders o JOIN statuses s ON (o.status_id = s.id) ORDER BY o.purchase_date DESC";
							$orders = mysqli_query($conn, $order_query);
							
							foreach($orders as $order){
								// var_dump($order);
								// /echo $order['id'];
							?>
							<tr>
							<td><?php echo $order['purchase_date']; ?></td>
							<td><?php echo $order['transaction_code']?></td>
							<td><?php echo $order['name']?></td>
							<td><?php



								?></td>
							<td>
								<?php if($order['name'] == "pending") { ?>
									<button data-id = "<?php echo $order['id']; ?>" type = "button" class = "complete_order btn btn-success m-1">Complete Order</button><br>
									<button data-id = "<?php echo $order['id']; ?>" type = "button" class = " cancel_order btn btn-danger m-1">Cancel Order</button>
								<?php } ?>
							</td>

							<tr>

							<?php }


						?>

					</tbody>
				</table>
			</div> <!-- end of col -->
		</div> <!-- end of row -->



<?php } else { 

	header('location: ./error.php');

} 

?>


<?php } ?>
