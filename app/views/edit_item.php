<?php require_once './../partials/template.php'?>


<?php function get_page_content () { 

	global $conn; 

	$item_id = $_GET['id'];

	$sql=  "SELECT * FROM items WHERE id = '$item_id'";

	$result = mysqli_query($conn, $sql);

	$item = mysqli_fetch_assoc($result);

	//$selected = false;

	// var_dump($item);

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
?>


<div class = "container">
	<div class = "row my-5">
		<div class = "col-sm-8 offset-sm-2">

			<?php echo $item_id ; ?>
			<?php echo $item['description'] ?>
			<form action="../controllers/process_edit_item.php" method="POST">
				<div class = "form-group">
					<label for="name"> Name: </label>
					<input type = "text" class = "form-control" name="name" value="<?php echo $item['name']?>" required>

					<label for="price"> Price: </label>
					<input type = "text" class = "form-control col-8" name="price" value="<?php echo $item['price']?>" required>

					<label for="desription"> Description: </label>
					<textarea type = "text" class = "form-control col-8" name="description" value="<?php echo $item['description']?>"><?php echo $item['description']?></textarea>

					<div class = form-group>
						<label for = "categories"> Categories </label>
						<select class = "form-control col-8" name = "category_id" id="category" required>
							<?php
								$sql = "SELECT * FROM categories";
								$categories = mysqli_query($conn, $sql);

								

								foreach($categories as $category){
									extract($category);

									if($id == $item['category_id']){
										$selected = 'selected';
									} else {
										$selected = '';
									}

									echo "<option value='$id' $selected> $name </option>";
								}
							?>

						</select>
						</div>

						<input type = "hidden" name = 'id' value = "<?php echo $item_id ;?>">
						<button type = "submit" class = "btn btn-primary"> Update Changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php } else {  

	header('location: ./error.php');

}
	?>

 <?php } ?>