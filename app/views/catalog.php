<?php require_once '../partials/template.php'?>

<?php function get_page_content () {

require_once '../controllers/connect.php'; // na-require na sa template

global $conn; ?>
<div class = "row no-gutters p-5">

<div class = "col-sm-2">

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
 	<ul class = "list-group border">
 		<a href="../controllers/sort.php?sort=asc">
 			<li class = "list-group-item">
 				Price(Lowest to Highest)
 			</li>
 		</a>
 		<a href="../controllers/sort.php?sort=desc">
 			<li class = "list-group-item">
 				Price(Highest to Lowest)
 			</li>
 		</a>
 	</ul>


</div>

<div class = "col-sm-10">
	
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

				$sorting = $_SESSION['sort'];
				echo $sorting;

					if(isset($_SESSION['sort'])){
						$sql2 .= " ORDER BY price $sorting"; //walang double quot yung $sorting since hindi 
					}




			$items = mysqli_query($conn, $sql2);

			echo "<div class='row no-gutters'>";

			foreach ($items as $item) { ?>

				<div class = "col-sm-3">
					<div id= "cards" class = "card h-100 m-1"> <!-- h-100 is 100 percent of content -->
						<img class = "card-img-top" src ="<?php echo $item['image_path']; ?>" height = "300px">
						<div class = "card-body">
							<h4 class = "card-title">
								<?php echo $item['name']; ?>
							</h4>
							<p class= "card-text" height="150px" style="background-color: pink">
								<?php echo $item['description'];?>
							</p>
							<p class ="card-text" height="50px">
								<?php echo $item['price']; ?>
							</p>
						</div>
					</div> <!-- end of card -->

				</div><!--  end item col -->

			<?php } echo "</div>" ;?>

	

</div>

</div>





<?php 

// $sql = "SELECT * FROM items";

// $result = mysqli_query($conn, $sql);

// $row = mysqli_fetch_assoc($result);

// while(mysqli_num_rows($))

?>









<?php } ?>