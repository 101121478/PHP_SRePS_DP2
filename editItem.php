<?php
$conn = mysqli_connect("localhost", "root", "", "php_sreps");

if(isset($_POST['ItemName'])) {
	$ItemID = $_POST['ItemID'];
	$ItemName = $_POST['ItemName'];
	$ItemDesc = $_POST['ItemDesc'];
	$ItemPrice = $_POST['ItemPrice'];
	
	$result = mysqli_query($conn, "UPDATE item SET ItemName='$ItemName', ItemDesc='$ItemDesc', ItemPrice='$ItemPrice' WHERE ItemID='$ItemID'");
	
	if($result) {
		echo 'Item information updated';
	}
}

?>