<?php
$conn = mysqli_connect("localhost", "root", "", "php_sreps");

if(isset($_POST['InvoiceID'])) {
	$InvoiceID = $_POST['InvoiceID'];
	$InvoiceDate = $_POST['InvoiceDate'];
	$ItemID = $_POST['ItemID'];
	$ItemName = $_POST['ItemName'];
	$ItemPrice = $_POST['ItemPrice'];
	$Quantity = $_POST['Quantity'];
	$TotalPrice = $_POST['TotalPrice'];

	$result1 = mysqli_query($conn, "UPDATE invoicedetail SET ItemID='$ItemID', Quantity='$Quantity', Total ='$TotalPrice'
	WHERE InvoiceID='$InvoiceID'");
	
	$result2 = mysqli_query($conn, "UPDATE invoice SET InvoiceDate='$InvoiceDate' WHERE InvoiceID='$InvoiceID'");
	
	if($result1) {
		echo 'Item information updated in invoicedetail table';
	}
	
	if($result2) {
		echo 'Item information updated in invoice table';
	}
}

?>