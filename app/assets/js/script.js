$(document).ready( function(){

	function validate_registration_form(){

		let username = $("#username").val();
		let password = $("#password").val();
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let address = $("#address").val();
		let errors = 0;

		if (username.length < 10){
			$('#username').next().html("⛔ Please provide a valid username");
			errors++;
		} else {
			$('#username').next().html("");
		}

		if (password.length < 10){
			$('#password').next().html("⛔ Please provide a stronger password");
			errors++;
		} else {
			$('#password').next().html("");
		}

		if(!email.includes('@')){
			$('#email').next().html("⛔ Please provide a valid email");
			errors++;
		} else {
			$('#email').next().html("");
		}

		if(firstname == ""){
			$('#firstname').next().html("⛔ Please provide your first name");
			errors++;
		} else {
			$('#firstname').next().html("");
		}

		if(lastname == ""){
			$('#lastname').next().html("⛔ Please provide your last name");
			errors++;
		} else {
			$('#lastname').next().html("");
		}

		if(address == ""){
			$('#address').next().html("⛔ Please provide an address");
			errors++;
		} else {
			$('#address').next().html("");
		}

		if(email == ""){
			$('#email').next().html("⛔ Please provide a valid email");
			errors++;
		} else {
			$('#email').next().html("");
		}

		if(password != $('#confirm_password').val()){
			$('#confirm_password').next().html("⛔ Passwords should match");
			errors++;
		} else {
			$('#confirm_password').next().html("");
		}

			// console.log(errors);

				// if(errors == 0){
				// 	return true;
				// } else {
				// 	return false;
				// }

		if(errors > 0){
			return false;
		} else {
			return true;
		}
	}


	$("#register").click( (e) => {

		if(validate_registration_form() == true){

			let username = $("#username").val();
			let password = $("#password").val();
			let firstname = $("#firstname").val();
			let lastname = $("#lastname").val();
			let email = $("#email").val();
			let address = $("#address").val();

			$.ajax({
				"url" : '../controllers/create_user.php', //the address is based on sa register page.
				"method" : "POST",
				"data" : {
					'username' :username,
					'password' :password,
					'firstname' :firstname,
					'lastname' :lastname,
					'email' :email,
					'address' :address
				},
				"success":(data) => {
					if(data == "user_exists"){
						$("#username").next().html()("⛔ Username already exists");
					} else{
						alert("user created successfully");
						window.location.replace("../../index.php");
					}
					//redirect broswer
					
				} //end of success of data

			}); //end of ajax


		} //end of if statement

	}); //end of click 

	//login and session
	$("#login").click( (e) => {
		let username = $("#username").val();
		let password = $("#password").val();

		$.ajax({
			"url" : "../controllers/authenticate.php",
			"method" : "POST",
			"data": {
				'username':username,
				'password':password
			},
			"success":(data) => {
				if(data == "login_failed") {
					$("#username").next().html("Please provide correct credentials");
				} else {
					window.location.replace("../views/home.php");
				}
			}
		});

	}); //end of login click

	$(document).on('click', '.add-to-cart', (e) => {
		e.preventDefault(); //prevents the default behavior of the button add-to-cart and override it on our own
		e.stopPropagation(); //prevent parent elements to be triggered

		let item_id = $(e.target).attr('data-id'); //target is the one who triggered the event which is the add-to-cart button. 
		//we get the value of the attribute data-id

		let item_quantity = parseInt($(e.target).prev().val()); //item quantity is the value of the previous sibling of the target

		$.ajax({
			"url" : "../controllers/update_cart.php",
			"method" : "POST",
			"data" : {
				"item_id" : item_id,
				"item_quantity" : item_quantity
			},
			"success" : (data) => {
				$("#cart-count").html(data);
			}

		}); //end of ajax

	}); //end of click




}); //end of document ready
