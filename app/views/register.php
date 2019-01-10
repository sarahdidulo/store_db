<?php require_once '../partials/template.php' ?>

<?php function get_page_content () { ?>

	<div class = "row no-gutters">

		<div class = "col-sm-12">
			<div id = "jumbo_reg" class = "jumbotron p-5">
				<p>Register</p>
			</div>
		</div>

	</div>

	<form class = "row no-gutters">
	
		<div class = "col-sm-6">
				<div class = "form-group p-4">
					<label for="firstname"> First Name: </label>
					<input id = "firstname" class = "form-control" type="text" name="firstname">
					<label for="lastname"> Last Name: </label>
					<input id = "lastname" class = "form-control" type="text" name="lastname">
					<label for="email"> Email: </label>
					<input id = "email" class = "form-control" type="text" name="email">
					<label for="address"> Address: </label>
					<input id = "address" class = "form-control" type="text" name="address">
				</div>
		</div>


		<div class = "col-sm-6">
				<div class = "form-group p-4">
					<label for="username"> Username: </label>
					<input id = "username" class = "form-control" type="text" name="username">
					<label for="password"> Password: </label>
					<input id = "password" class = "form-control" type="text" name="password">
					<label for="confirm_password"> Confirm Password: </label>
					<input id = "confirm_password" class = "form-control" type="text" name="confirm_password">
				</div>
		</div>

		<div class = "col-sm-6 text-center">
			<button class = "btn bg-info w-50" type="button"> Login </button>
		</div>
		<div class = "col-sm-6 text-center">
			<button class = "btn bg-info w-50" type="button"> Register </button>
		</div>

		
	</form>
		



	



<?php } ?>