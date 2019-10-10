<?php
	if (isset ($_POST["InvoiceID"])) {
		$InvoiceID = $_POST["InvoiceID"];
		$_SESSION['InvoiceID'] = $InvoiceID;
	}
	else {
		echo "<p>Invoice ID Required</p>";
	}
	
	if (isset ($_POST["ItemID"])) {
		$ItemID = $_POST["ItemID"];
		$_SESSION['ItemID'] = $ItemID;
	}
	else {
		echo "<p>Item ID Required</p>";
	}
	
	if (isset ($_POST["Quantity"])) {
		$Quantity = $_POST["Quantity"];
		$_SESSION['Quantity'] = $Quantity;
	}
	else {
		echo "<p>Quantity Required</p>";
	}
	
	if (isset ($_POST["Total"])) {
		$Total = $_POST["Total"];
		$_SESSION['Total'] = $Total;
	}
	else {
		echo "<p>Total cost required</p>";
	}
	if (isset ($_POST["InvoiceDate"])) {
		$InvoiceDate = $_POST["InvoiceDate"];
		$_SESSION['InvoiceDate'] = $InvoiceDate;
	}
	else {
		echo "<p>Invoice date required</p>";
	}

	$errMsg = "";
	
	if($InvoiceID == "")
	{
		$errMsg .= "<p>Invoice id required</p>";
	}
	
	if($ItemID == "")
	{
		$errMsg .= "<p>Item id required</p>";
	}
	
	if($Quantity == "")
	{
		$errMsg .= "<p>Quantity required</p>";
	}
	
	if($Total == "")
	{
		$errMsg .= "<p>Total cost required</p>";
	}
	if($InvoiceDate == "")
	{
		$errMsg .= "<p>Invoice date required</p>";
	}
	
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		
		$insertInvoice = mysqli_query($connect, "INSERT INTO invoice(InvoiceID, InvoiceDate) VALUES ('$InvoiceID', '$InvoiceDate')");
		
		if(!$insertInvoice) 
		{
			echo("Error description: " . mysqli_error($connect));
		} 
		$insertNewSale = mysqli_query($connect, "INSERT INTO invoicedetail (InvoiceID, ItemID, Quantity, Total) VALUES ('$InvoiceID', '$ItemID', '$Quantity', '$Total')");
		if(!$insertNewSale)
		{
			echo("Error description: " . mysqli_error($connect));
		}
		else 
		{
			echo "Sale successfully added";
		}
		
	}
?>
</body
</html>