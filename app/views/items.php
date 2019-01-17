<?php require_once './../partials/template.php' ?>

<?php function get_page_content() {

	global $conn; 

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {

	?>



	<div class = "container">
		<div class = "row my-3">
			<a href = "./new_item.php" class = "btn btn-primary"> Add New Item </a>
		</div>

		<?php

		$sql = "SELECT * FROM items";

		$items = mysqli_query($conn, $sql);

		?>

		<div class = "row my-3">

		<?php foreach($items as $item) { ?>

			<div class = "col-sm-3 py-2">
				<div class = "card h-100" >
					<img src = "<?php echo $item['image_path']?>" class = "card-img-top" style="height: 150px;">
					<div class = "card-body">
						<h4 class = "card-title"><?php echo $item['name']; ?></h4>
						<p class = "card-text"> <?php echo $item['description'] ;?></p>
						<p class = "card-text"> <?php echo $item['price']; ?> </p>

						<input type = "hidden" value = "id of item">

					</div> <!-- end of card body -->
					<div class = "card-footer">
						<a href = "./edit_item.php?id=<?php echo $item['id']; ?>" class = "btn btn-primary">Edit Item</a>
						<a href = "../controllers/delete_item.php?id=<?php echo $item['id']; ?>" class = "btn btn-danger">Delete Item</a>
					</div> <!-- end of card footer -->	
				</div>
			</div> <!-- end of col -->

		<?php } ?>



		</div> <!-- end of row -->
	</div>

<?php } else {

	header('location: ./error.php');

	} ?>


<?php } ?>	