<?php
	if (isset ($_POST["InvoiceDetail"])) {
		$InvoiceDetail = $_POST["InvoiceDetail"];
		$_SESSION['InvoiceDetail'] = $InvoiceDetail;
	}
	else {
		echo "<p>Invoice detail Required</p>";
	}
	
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
	
	if($InvoiceDetail == "")
	{
		$errMsg = "<p>Invoice detail required</p>";
	}
	
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
		
		$invoiceIDCheck = "SELECT * FROM invoice WHERE InvoiceID like '%".$InvoiceID."%'";
		
		$resultOfInvoiceCheck = mysqli_query($connect, $invoiceIDCheck);
		if(!mysqli_num_rows($resultOfInvoiceCheck) > 0)
		{
			$insertInvoice = mysqli_query($connect, "INSERT INTO invoice(InvoiceID, InvoiceDate) VALUES ('$InvoiceID', 'InvoiceDate')");
		} 
		
		$invoiceDetailCheck = "SELECT InvoiceDetail FROM invoicedetail WHERE InvoiceDetail LIKE '%".$InvoiceDetail."%'";
		$resultInvoiceDetailCheck = mysqli_query($connect, $invoiceDetailCheck);
		
		if(!mysqli_num_rows($resultInvoiceDetailCheck) > 0)
		{
			$insertNewSale = "INSERT INTO invoicedetail (InvoiceDetail, InvoiceID, ItemID, Quantity, Total) VALUES ('$InvoiceDetail', '$InvoiceID', '$ItemID', '$Quantity', '$Total')";
			$result = mysqli_query($connect, $insertNewSale);
			echo "Sale successfully added";
			
		} else {
			echo "<p>Invalid Invoice Detail. Invoice detail already exists.</p>";
		}
		/*$query1 = "INSERT INTO item(ItemName, ItemDesc, ItemPrice) VALUES ('$itemName', '$itemDesc', '$itemPrice')";
		$result1 = mysqli_query($connect, $query1);	
		
		$itemIDquery= "SELECT itemID from item where itemname like '%".$itemName."%' AND itemdesc like '%".$itemDesc."%'";
		$itemIDresult = mysqli_query($connect, $itemIDquery);
		$row = mysqli_fetch_array($itemIDresult);
		$itemID = $row['itemID'];
		
		$query3= "INSERT into inventory(itemID, Current_stock, Low_stock, Expiry_date, Shelf) VALUES ('$itemID', '$itemQuantity', '$lowStockAmount', '$expiryDate', '$shelf')";
		$result3 = mysqli_query($connect, $query3);
		
		if(! $result1 )
		{
			echo 'Could not enter data: ' . mysql_error();
		}
		echo "Entered data successfully";
*/	}
?>
</body
</html>