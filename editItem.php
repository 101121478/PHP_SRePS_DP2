<?php
$conn = mysqli_connect("localhost", "root", "", "php_sreps");

if(isset($_POST['ItemName'])) {
	$ItemID = $_POST['ItemID'];
	$ItemName = $_POST['ItemName'];
	$ItemDesc = $_POST['ItemDesc'];
	$ItemQuantity= $_POST['ItemQuantity'];
	$ItemPrice = $_POST['ItemPrice'];
	
	$result1 = mysqli_query($conn, "UPDATE item SET ItemName='$ItemName', ItemDesc='$ItemDesc', ItemPrice= $ItemPrice WHERE ItemID='$ItemID'");
	
	$result3 = mysqli_query($conn, "UPDATE inventory SET Current_stock= $ItemQuantity WHERE ItemID=$ItemID ");
	
	if($result1) {
		echo 'Item information updated';
	}
}

?>