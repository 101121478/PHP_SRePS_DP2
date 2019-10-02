<?php
	if (isset ($_POST["ItemName"])) {
		$itemName = $_POST["ItemName"];
		$_SESSION['ItemName'] = $itemName;
	}
	else {
		echo "<p>Item Name Required</p>";
	}
	
	if (isset ($_POST["ItemDesc"])) {
		$itemDesc = $_POST["ItemDesc"];
		$_SESSION['ItemDesc'] = $itemDesc;
	}
	else {
		echo "<p>Item Description Required</p>";
	}
	
	if (isset ($_POST["ItemPrice"])) {
		$itemPrice = $_POST["ItemPrice"];
		$_SESSION['ItemPrice'] = $itemPrice;
	}
	else {
		echo "<p>Item Price Required</p>";
	}
	
	if (isset ($_POST["ItemQuantity"])) {
		$itemQuantity = $_POST["ItemQuantity"];
		$_SESSION['ItemQuantity'] = $itemQuantity;
	}
	else {
		echo "<p>Item Quantity Required</p>";
	}
	
	if (isset ($_POST["LowStockAmount"])) {
		$lowStockAmount = $_POST["LowStockAmount"];
		$_SESSION['LowStockAmount'] = $lowStockAmount;
	}
	else {
		echo "<p>Low stock amount required</p>";
	}
	if (isset ($_POST["ExpiryDate"])) {
		$expiryDate = $_POST["ExpiryDate"];
		$_SESSION['ExpiryDate'] = $expiryDate;
	}
	else {
		echo "<p>Expiry date required</p>";
	}
	
	if (isset ($_POST["Shelf"])) {
		$shelf = $_POST["Shelf"];
		$_SESSION['Shelf'] = $shelf;
	}
	else {
		echo "<p>Shelf required</p>";
	}
	
	$errMsg = "";
	
	if($itemName == "")
	{
		$errMsg = "<p>Item name required</p>";
	}
	
	if($itemDesc == "")
	{
		$errMsg .= "<p>Item description required</p>";
	}
	
	if($itemPrice == "")
	{
		$errMsg .= "<p>Item price required</p>";
	}
	
	if($itemQuantity == "")
	{
		$errMsg .= "<p>Item quantity required</p>";
	}
	
	if($lowStockAmount == "")
	{
		$errMsg .= "<p>Low stock amount required</p>";
	}
	if($expiryDate == "")
	{
		$errMsg .= "<p>Expiry date required</p>";
	}
	if($shelf == "")
	{
		$errMsg = "<p>Shelf required</p>";
	}
	
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		$query1 = "INSERT INTO item(ItemName, ItemDesc, ItemPrice) VALUES ('$itemName', '$itemDesc', '$itemPrice')";
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
	}
?>
</body
</html>