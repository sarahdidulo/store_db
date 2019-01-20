<?php

session_start();

	function getCartCount() {
		return array_sum($_SESSION['cart']);
	}


	//if update_from_cart_page is 1, it will pass item_id and item_quantity from ajax
	$item_id = $_POST['item_id'];
	$item_quantity = $_POST['item_quantity'];


	// $_SESSION['cart'][$item_id] += $item_quantity;

	//$_SESSION['cart'][$item_id] -> quantity in cart of the item

	if($item_quantity == "0"){
		unset($_SESSION['cart'][$item_id]);
	} else {
		if(isset($_SESSION['cart'][$item_id])){
			$update_flag = $_POST['update_from_cart_page'];

			if($update_flag == 0){
				//in catalog page, add as there is an exists
				$_SESSION['cart'][$item_id] += $item_quantity; //if there is no update flag, add to the quantity in the cart
			} else {
				$_SESSION['cart'][$item_id] = $item_quantity; //if there is and update flag, update or override the quantity of the item
			}
			
		} else {
			$_SESSION['cart'][$item_id] = $item_quantity;
		}
	}

	echo getCartCount();




?>