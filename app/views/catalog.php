<?php require_once '../partials/template.php'?>

<?php function get_page_content () {

if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 2){

require_once '../controllers/connect.php'; // na-require na sa template

global $conn; 

?>
<div class = "page_bg row no-gutters">

<div class = "catalog_list col-sm-3">

	<!-- <form method="GET" action="catalog.php">
		<div class="list-group">
			  <a href="#" class="list-group-item list-group-item-action active" type="submit">
			    Breakfast
			  </a>
			  <a href="#" class="list-group-item list-group-item-action" type="submit">Lunch</a>
			  <a href="#" class="list-group-item list-group-item-action">Dinner</a>
			  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
			  <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
		</div>
	</form>
 -->
 	<h2>Categories</h2>
	 	<ul class = "list-group">
	 		<a href ="catalog.php">
	 			<li class = "list-group-item"> All </li>
	 		</a>

	 		<?php 
	 			$sql1 = "SELECT * FROM categories";
	 			$categories = mysqli_query($conn, $sql1);

	 			foreach($categories as $category){ ?>

	 				<a href = "catalog.php?category_id=<?php echo $category['id']?>">
	 					<li class = "list-group-item">
	 						<?php echo $category['name']; ?>
	 					</li>
	 				</a>

	 			<?php } ?>
	 		
	 	</ul>


 	<h2>Sort</h2>
 	<ul class = "list-group">
 		<a href="../controllers/sort.php?sort=asc">
 			<li class = "list-group-item">
 				Price (Lowest to Highest)
 			</li>
 		</a>
 		<a href="../controllers/sort.php?sort=desc">
 			<li class = "list-group-item">
 				Price (Highest to Lowest)
 			</li>
 		</a>
 	</ul>


</div>

<div class = "card-group col-sm-9">
	
		<?php


			// if( isset ($_GET['category_id']) ){
			// 	$current_category_id = $_GET['category_id'];
			// 	$sql2 = "SELECT * FROM items WHERE category_id = '$current_category_id'";
			// } else {
			// 	$sql2 = "SELECT * FROM items";
			// }

			$sql2 = "SELECT * FROM items";

					// filter via category
					if(isset($_GET['category_id'])) {
						$sql2 .=" WHERE category_id =".$_GET['category_id'];
					}

			// echo $_SESSION['sort'];
				// $_SESSION['sort'] = $_GET['sort']; //can also be implemented if walang sort.php


				if(isset($_SESSION['sort'])){
					$sorting = $_SESSION['sort'];
					$sql2 .= " ORDER BY price $sorting"; //walang double quot yung $sorting since hindi value
				}
				// echo $sorting;





			$items = mysqli_query($conn, $sql2);

			echo "<div class='row no-gutters'>";

			foreach ($items as $item) { ?>

				<div class = "catalog col-sm-3">
					<div id= "cards" class = "card"> <!-- h-100 is 100 percent of content -->
						<img class = "card-img-top" src ="<?php echo $item['image_path']; ?>" height = "150px">
						<div class = "card-body">
							<h4 class = "card-title">
								<?php echo $item['name']; ?>
							</h4>
							<div class= "card-text card_desc" style="height: 50px;">
								<?php echo $item['description'];?>
							</div>
							<p class ="card-text">
								<?php echo "₱ " . $item['price']; ?>
							</p>
						</div>

						<div class = "card-footer">
							<input type = "number" class = "form-control my-2" value="1">
							<button type = "submit" class = "btn btn-block add-to-cart" data-id="<?php echo $item['id']; ?>"> Add to cart </button>
						</div>


					</div> <!-- end of card -->

				</div><!--  end item col -->

			<?php } echo "</div>" ;?>

	

</div>

</div>





<?php } else {

	header('location: ./error.php');

}



?>









<?php } ?>