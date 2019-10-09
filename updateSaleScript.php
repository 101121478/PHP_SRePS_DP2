<?php
$conn = mysqli_connect("localhost", "root", "", "php_sreps");

if(isset($_POST['InvoiceID'])) {
	$InvoiceID = $_POST['InvoiceID'];
	$InvoiceDetail = $_POST['InvoiceDetail'];
	$InvoiceDate = $_POST['InvoiceDate'];
	$ItemID = $_POST['ItemID'];
	$ItemName= $_POST['ItemName'];
	$Quantity = $_POST['Quantity'];
	$Total = $_POST['Total'];
	
	$result1 = mysqli_query($conn, "UPDATE invoice SET date=$InvoiceDate WHERE InvoiceID=$InvoiceID");
	
	$result2 = mysqli_query($conn, "UPDATE invoicedetail SET ItemID=$ItemID, Quantity=$Quantity, Total=$Total WHERE InvoiceDetail='$InvoiceDetail'");
	
	if($result1) {
		echo 'Item information updated';
	}
}

?>
</body
</html>