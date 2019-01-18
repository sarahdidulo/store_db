<?php session_start();

require_once './connect.php'; 

//Load Composer's autoloader
require '../../vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// required paypal classes
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment; 

require "./paypal/start.php";

?>

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
	$payment_mode_id = $_POST['payment_mode'];
	$address = $_POST['addressLine1'];	


	if ($payment_mode_id == 1){ //if payment_mode is COD

		$transaction_number = generate_new_transaction_number();

		// Route user to confirmation cairo_pattern_get_extend(pattern)
	    $_SESSION['new_txn_number'] = $transaction_number;

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

		//clear items from cart
		$_SESSION['cart'] = [];

		// Send email notification to customer
		// ==============================================================================



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

		    header('location: ../views/confirmation.php');

		    $mail->send();
		    // echo 'Message has been sent';

		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}


		mysqli_close($conn);



} //end of payment mode is COD
else {

	$_SESSION['address'] = $_POST['addressLine1'];
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $total = 0;
    $items = [];
    foreach($_SESSION['cart'] as $id => $quantity){
        $sql = "SELECT * FROM items WHERE id =$id";
        $result = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($result);
        extract($item);
        $total += $price*$quantity;
        $indiv_item = new Item();
        $indiv_item->setName($name)
                ->setCurrency('PHP')
                ->setQuantity($quantity)
                ->setPrice($price);
        $items[] = $indiv_item;        
    }

    $item_list = new ItemList();
    $item_list->setItems($items);

    $amount = new Amount();
    $amount->setCurrency("PHP")
        ->setTotal($total);

    $transaction = new Transaction();
    $transaction ->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Payment for Qstore Purchase')
                ->setInvoiceNumber(uniqid("Qstore_"));

    $redirectUrls = new RedirectUrls();
    $redirectUrls
        ->setReturnUrl('https://cake-store-db.herokuapp.com/batch19/store/app/controllers/pay.php?success=true')
        ->setCancelUrl('https://cake-store-db.herokuapp.com/batch19/store/app/controllers/pay.php?success=false');

    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions([$transaction]);

    try{
        $payment->create($paypal);
    } catch(Exception $e){
        die($e->getData());
    }

    $approvalUrl = $payment->getApprovalLink();
    header('location: '.$approvalUrl);

}



?>
