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
		
		$oldStock = mysqli_query($connect, "SELECT Current_stock FROM inventory WHERE inventory.ItemID = '$ItemID'");
		$stockReset = $oldStock -> fetch_array(MYSQLI_NUM);
		$checkStock = mysqli_query($connect, "UPDATE inventory SET Current_stock = (CASE WHEN Current_stock - '$Quantity' > Low_Stock THEN Current_stock - '$Quantity' WHEN Current_stock - '$Quantity' <= Low_Stock AND Current_stock - '$Quantity' > 0 THEN Current_stock - '$Quantity' WHEN Current_stock - '$Quantity' = 0 THEN Current_stock - '$Quantity' ELSE '$stockReset[0]' END) WHERE inventory.ItemID = '$ItemID'");
		$updatedStock = mysqli_query($connect, "SELECT Current_stock FROM inventory WHERE inventory.ItemID = '$ItemID'");
		$lowStock = mysqli_query($connect, "SELECT Low_stock FROM inventory WHERE inventory.ItemID = '$ItemID'");
		if(!$checkStock)
		{
			echo("Error, Not enough of the Item in Stock" . mysqli_error($connect)."<br>");
		}
		else{
			if ($checkStock[0]<0)
			{
				echo("Error Not Enough in Stock to Complete Purchase");
			}
			else
			{
				$row = $updatedStock -> fetch_array(MYSQLI_NUM);
				$col = $lowStock -> fetch_array(MYSQLI_NUM);
				echo ("Current Stock: ". $row[0] ."<br>");
				if($row[0] == $stockReset[0])
				{
					echo("UNABLE TO UPDATE, NOT ENOUGH STOCK");
				}
				elseif($row[0] <= $col[0] && $row[0] > 0)
				{
					echo("Low Stock, restock is needed soon");
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
				elseif($row[0] <= 0)
				{
					echo("OUT OF STOCK, RESUPPLY IMMEDIATELY");
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
				
			}
		}
		
		
		
	}
?>
</body
</html>