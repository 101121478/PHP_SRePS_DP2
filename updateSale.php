<?php
	if (isset ($_POST["InvoiceD"])) {
		$invoiceD = $_POST["InvoiceD"];
		$_SESSION['InvoiceD'] = $invoiceD;
	}
	else {
		echo "<p>Invoice Detail Required</p>";
	}
	
	if (isset ($_POST["InvoiceID"])) {
		$invoiceId = $_POST["InvoiceID"];
		$_SESSION['InvoiceID'] = $invoiceId;
	}
	
	if (isset ($_POST["ItemID"])) {
		$itemId = $_POST["ItemID"];
		$_SESSION['ItemID'] = $itemId;
	}
	
	if (isset ($_POST["Quantity"])) {
		$quantity = $_POST["Quantity"];
		$_SESSION['Quantity'] = $quantity;
	}
	
	if (isset ($_POST["TotalPrice"])) {
		$totalPrice = $_POST["TotalPrice"];
		$_SESSION['TotalPrice'] = $totalPrice;
	}
	
	if (isset ($_POST["InvoiceDate"])) {
		$rawDate = $_POST["InvoiceDate"];
		$invoiceDate = date('Y-m-d', strtotime($rawDate));
		$_SESSION['InvoiceDate'] = $invoiceDate;
	}
	
	if (isset ($_POST["InvoiceID"])||isset ($_POST["ItemID"])||isset ($_POST["Quantity"])||isset ($_POST["TotalPrice"])||isset ($_POST["InvoiceDate"])) {
		
	}
	else{
		echo "<p>At least one value needs to be set to change before you can update the invoice</p>";
	}
	
	$errMsg = "";
	
	if($invoiceD == "")
	{
		$errMsg = "<p>Invoice Detail number required</p>";
	}
	
	if($invoiceId == "" && $itemId == "" && $quantity == "" && $totalPrice == "" && $invoiceDate == "")
	{
		$errMsg .= "<p>At least one value needs to be set to change before you can update the invoice</p>";
	}
	
	if($errMsg != "")
	{
		echo $errMsg;;
	echo $invoiceDate;
	} else {
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		$query1 = "UPDATE invoicedetail 
		SET 
		InvoiceID = CASE WHEN $invoiceId IS NOT NULL THEN $invoiceId ELSE InvoiceID END
		where InvoiceDetail = $invoiceD";
		$result1 = mysqli_query($connect, $query1);	
		$query2 = "UPDATE invoicedetail 
		SET 
		ItemID = CASE WHEN $itemId IS NOT NULL THEN $itemId ELSE ItemID END
		where InvoiceDetail = $invoiceD";
		$result2 = mysqli_query($connect, $query2);
		$query3 = "UPDATE invoicedetail 
		SET 
		Quantity = CASE WHEN $quantity IS NOT NULL THEN $quantity ELSE Quantity END
		where InvoiceDetail = $invoiceD";
		$result3 = mysqli_query($connect, $query3);
		$query4 = "UPDATE invoicedetail 
		SET 
		Total = CASE WHEN $totalPrice IS NOT NULL THEN $totalPrice ELSE Total END
		where InvoiceDetail = $invoiceD";
		$result4 = mysqli_query($connect, $query4);
		$query5 = "UPDATE invoicedetail 
		SET 
		InvoiceDate = CASE WHEN $invoiceDate IS NOT NULL THEN '$invoiceDate' ELSE InvoiceDate END
		where InvoiceDetail = $invoiceD";
		$result5 = mysqli_query($connect, $query5);
		if(! $result1 && ! $result2 && ! $result3 && ! $result4 && ! $result5)
		{
			echo 'Could not enter data: ' . mysqli_error($connect);
		}
		echo "Updated data successfully";
	}
?>
</body
</html>