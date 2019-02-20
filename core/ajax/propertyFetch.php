<?php include '../init.php';

	if (isset($_POST['propertyId'])) {
		$ID = $_POST['propertyId'];

		$getDetails = $admin->DisplayOne('property', 'price', array('property_id'=>$ID));
		echo $getDetails->price;
	}

	if (isset($_POST['Qty']) && isset($_POST['Price'])) {
		$qty = $_POST['Qty'];
		$price = $_POST['Price'];

		$product = $qty * $price;
		echo $product;
	}


?>