<?php require_once '../partials/template.php' ?>

<?php function get_page_content () { 

	global $conn;

	?>


	<div class = "form_bg row no-gutters">

		<!-- <div class = "col-sm-12">
			<div id = "jumbo_reg" class = "jumbotron p-5">
				<p>Register</p>
			</div>
		</div> -->

	
		<div class = "col-sm-12">

		<form id = "form_row">
		
			<div class = "sub_entry">
					<div class = "form-group p-4">
						<label for="firstname"> First Name: </label>
						<input id = "firstname" class = "form-control" type="text" name="firstname">
						<p class = "validation"></p>
						<label for="lastname"> Last Name: </label>
						<input id = "lastname" class = "form-control" type="text" name="lastname">
						<p class = "validation"></p>
						<label for="email"> Email: </label>
						<input id = "email" class = "form-control" type="text" name="email">
						<p class = "validation"></p>
						<label for="address"> Address: </label>
						<input id = "address" class = "form-control" type="text" name="address">
						<p class = "validation"></p>
					</div>

				<div>
					<button id = "login" class = "login_btn btn w-50" type="button"> Login </button>
				</div>
			</div>


			<div class = "sub_entry">
					<div class = "form-group p-4">
						<label for="username"> Username: </label>
						<input id = "username" class = "form-control" type="text" name="username">
						<p class = "validation"></p>
						<label for="role"> Role: </label>
						<select id = "role" class = "form-control" type="text" name="role">
							<option value = 1>Admin</option>
							<option value = 2>User</option>
						</select>
						<br>
						<label for="password"> Password: </label>
						<input id = "password" type = "password" class = "form-control" type="text" name="password">
						<p class = "validation"></p>
						<label for="confirm_password"> Confirm Password: </label>
						<input id = "confirm_password" type = "password" class = "form-control" type="text" name="confirm_password">
						<p class = "validation"></p>
					</div>

					<div>
						<button id = "register" class = "register_btn btn w-50" type="button"> Register </button>
					</div>
			</div>
	
		</form>

	</div>

	</div>


<?php } ?>