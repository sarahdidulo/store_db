<?php require_once '../partials/template.php'; ?>

<?php function get_page_content () { ?>

	<div class = "row no-gutters">

		<div class = "col-sm-12">
			<div id = "jumbo_login" class = "jumbotron p-5">
				<p>Login</p>
			</div>
		</div>

	</div>

	<form id = "form_login" action = "../controllers/authenticate.php" method="POST">
		<div class = "form-group">
			<label for="username"> Username: </label>
			<input id = "username" class = "form-control" type="text" name="username">
			<p class = "validation"></p>
		</div>

		<div class = "form-group">
			<label for="password"> Password: </label>
			<input id = "password" type = "password" class = "form-control" type="text" name="password">
			<p class = "validation"></p>
		</div>

		<div class = "text-center py-4">
			<a href = "./register.php" class = "btn"> Register </a>
			<button id = "login" type = "submit" class = "btn"> Login </button>
		</div>
	</form>



<?php } ?>