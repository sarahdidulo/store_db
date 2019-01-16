<?php require_once './../partials/template.php' ; ?>

<?php function get_page_content() { ?>

<?php global $conn; ?>

<div class = "container">
	<div class = "row">

		<div class = "col-sm-8 offset-sm-2">

			<form class = "my-5" action = "../controllers/process_add_item.php" method = "POST" enctype="multipart/form-data">

				<div class = "form-group">
					<label for = "name"> Name: </label>
					<input type = "text" class = "form-control" name = "name" id = "name" required>
				</div>

				<div class = "form-group">
					<label for = "price"> Price: </label>
					<input type = "text" class = "form-control" name = "price" id = "price" required>
				</div>

				<div class = "form-group">
					<label for = "description"> Description: </label>
					<input type = "text" class = "form-control col-8" rows="5" name = "description" id = "description">
				</div>

				<div class = "form-group">
					<label for = "categories"> Categories: </label>
					<select class = "form-control col-8" name = "category_id" id="categories" required>
						
						<?php

							$sql = "SELECT * FROM categories";
							$categories = mysqli_query($conn, $sql);

							foreach($categories as $category){
								//extract is another was of getting data. it transforms columns into variables.

								extract($category);

								echo "<option value='$id'>$name</option>";
							}


						?>

					</select>

				</div> <!-- end of categories form-group -->

				<div class = "form-group">
					<label for = "image"> Image: </label>
					<input type = "file" id = "image" class = "form-control" name = "image" required>
				</div>

				<button type = "submit" class = "btn btn-primary btn-block"> Add New Item </button>
				

			</form> <!-- end of form -->

		</div> <!-- end of 8 cols -->

	</div> <!-- end row -->


</div> <!-- end container -->



<?php } ?>

