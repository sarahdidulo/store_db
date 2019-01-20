<?php require_once './../partials/template.php' ?>

<?php function get_page_content() {

	global $conn; 

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {

		$sql = "SELECT * FROM items";

		$items = mysqli_query($conn, $sql);

	?>

		<div class = "items_bg row no-gutters">

			<div class = "item_button col-sm-12">

				<a href = "./new_item.php" class = "add_new_item btn"> Add New Item </a>

			</div>


			<?php foreach($items as $item) { ?>

				<div class = "items col-sm-3">
					<div class = "card" >
						<img src = "<?php echo $item['image_path']?>" class = "card-img-top" style="height: 150px;">
						<div class = "card-body">
							<h4 class = "card-title"><?php echo $item['name']; ?></h4>
							<p class = "items_desc card-text"> <?php echo $item['description'] ;?></p>
							<p class = "items_price card-text"> <?php echo "₱ " . $item['price']; ?> </p>

							<input type = "hidden" value = "id of item">

						</div> <!-- end of card body -->
						<div class = "card-footer">
							<a href = "./edit_item.php?id=<?php echo $item['id']; ?>" class = "edit_item btn">Edit Item</a>
							<a href = "../controllers/delete_item.php?id=<?php echo $item['id']; ?>" class = "delete_item btn">Delete Item</a>
						</div> <!-- end of card footer -->	
					</div>
				</div> <!-- end of col -->

			<?php } ?>

		</div> <!-- end of row -->

<?php } else {

	header('location: ./error.php');

	} ?>


<?php } ?>	