<?php session_start(); ?>

<?php require_once './connect.php'; ?>

<?php function generate_new_transaction_number() { 

	$ref_number = '';

	$source = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');

	for($i = 0; $i < 16; $i++){

		$index = rand(0,15); //generates a random number from 0-15

		$ref_number .= $source[$index];

	} 

	$today = getDate();
	return $ref_number.'-'.$today[0]; //seconds since Unix Epoc

} //end of function

	//get all the details of the order

	$user_id = $_SESSION['user']['id'];
	$purchase_date = date("Y-m-d G:i:s");

	$status_id = 1;
	$payment_mode_id = 1;
	$address = $_POST['addressLine1'];	
	$transaction_number = generate_new_transaction_number();

	$sql = "INSERT INTO orders(user_id, transaction_code, purchase_date, status_id, payment_mode_id) VALUES ('$user_id', '$transaction_number', '$purchase_date', '$status_id', '$payment_mode_id'); ";

	$result = mysqli_query($conn, $sql);

	$new_order_id = mysqli_insert_id($conn);

	if($result){

		foreach($_SESSION['cart'] as $item_id => $qty){
			//get the price of the current item
			$sql = "SELECT price FROM items WHERE id = '$item_id'";
			$result = mysqli_query($conn, $sql);

			$item = mysqli_fetch_assoc($result);

			$sql = "INSERT INTO order_items (order_id, item_id, quantity, price) VALUES ('$new_order_id', '$item_id', '$qty', '".$item['price']."') ";

			$result = mysqli_query($conn, $sql); //update result

		}

	}


// echo $transaction_number;
// echo $user_id;
// echo $address;


//clear items from cart
$_SESSION['cart'] = [];

// Send email notification to customer
// ==============================================================================
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$mail = new PHPMailer(true); 
// Passing `true` enables exceptions

$staff_email = 'sarahdidulo11@gmail.com';
$customer_email = $_SESSION['user']['email'];          //
$subject = 'Qstore Phils - Order Confirmation';
$body = '<div style="text-transform:uppercase;"><h3>Reference No.: '.$transaction_number.'</h3></div>'."<div>Ship to $address</div>";
try {
    //Server settings
    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $staff_email;                       // SMTP username
    $mail->Password = 'testpass11';                     // SMTP password or password of unsecure email 
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($staff_email, 'Store');
    $mail->addAddress($customer_email);  // Name is optional

    //Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Route user to confirmation cairo_pattern_get_extend(pattern)
    $_SESSION['new_txn_number'] = $transaction_number;
    header('location: ../views/confirmation.php');

    $mail->send();
    // echo 'Message has been sent';

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


	mysqli_close($conn);





?>
