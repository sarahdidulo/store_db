<?php require_once '../partials/template.php' ?>

<?php function get_page_content () {

	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {

	global $conn;

	?>

	<div class = "container">
		<h4 class = "text-center">User Admin Page</h4>
		<div class = "row">
			<div class = "col-sm-8 offset-sm-2">
				<table class = "table table-responsive table-striped">
					<thead>
						<tr>
							<th>Username</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						
						<?php

							$get_user_detail_query = "SELECT u.id, u.username, u.firstname, u.lastname, u.email, r.name AS role FROM users u JOIN roles r ON(u.roles_id = r.id)";

							$user_details = mysqli_query($conn, $get_user_detail_query);



							foreach($user_details as $indiv_user){

								$id = $indiv_user['id'];

								// if($_SESSION['user']['id'] != $indiv_user['id']){ //current user will not appear for revoke admin
								$disabled = $_SESSION["user"]["id"] == $id ? "disabled" : ""; 




						?>

							<tr>
								<td><?php echo $indiv_user['username']?></td>
								<td><?php echo $indiv_user['firstname']?></td>
								<td><?php echo $indiv_user['lastname']?></td>
								<td><?php echo $indiv_user['email']?></td>
								<td><?php echo $indiv_user['role']?></td>
								<td>
									<?php 
										if($indiv_user['role']=='user'){ 
											echo '<button type = "button" data-id='.$id.' class="update_role btn btn-success"> Make Admin</button>' ;
										} else if ($indiv_user['role'] == 'admin'){
											
											echo '<button type = "button" data-id='.$id.' class="update_role btn btn-danger" '.$disabled.' >Revoke Admin</button>'; 
										} 

									?> 
								</td>
							</tr>


						<?php } ?>	

					</tbody>

				</table>
			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->





<?php } else { 

	header('location: ./error.php');

}

	?>





<?php } ?>