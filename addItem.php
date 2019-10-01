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
	
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		$query = "INSERT INTO item(ItemName, ItemDesc, ItemPrice) VALUES ('$itemName', '$itemDesc', '$itemPrice')";
		$result = mysqli_query($connect, $query);	
		
		if(! $result )
		{
			echo 'Could not enter data: ' . mysql_error();
		}
		echo "Entered data successfully";
	}
?>
</body
</html>