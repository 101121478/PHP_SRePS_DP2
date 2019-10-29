<?php
if(isset($_POST["month"]))
{
	$month = $_POST["month"];

	if($month == "1") {
		$from_date = "2019-01-01";
		$to_date = "2019-01-31";
	}
	
	if($month == "2") {
		$from_date = "2019-02-01";
		$to_date = "2019-02-28";
	}
	
	if($month == "3") {
		$from_date = "2019-03-01";
		$to_date = "2019-03-31";
	}
	
	if($month == "4") {
		$from_date = "2019-04-01";
		$to_date = "2019-04-30";
	}
	
	if($month == "5") {
		$from_date = "2019-05-01";
		$to_date = "2019-05-31";
	}
	
	if($month == "6") {
		$from_date = "2019-06-01";
		$to_date = "2019-06-30";
	}
	
	if($month == "7") {
		$from_date = "2019-07-01";
		$to_date = "2019-07-31";
	}
	if($month == "8") {
		$from_date = "2019-08-01";
		$to_date = "2019-08-31";
	}
	
	if($month == "9") {
		$from_date = "2019-09-01";
		$to_date = "2019-09-30";
	}
	
	if($month == "10") {
		$from_date = "2019-10-01";
		$to_date = "2019-10-31";
	}
	if($month == "11") {
		$from_date = "2019-11-01";
		$to_date = "2019-11-30";
	}
	
	if($month == "12") {
		$from_date = "2019-12-01";
		$to_date = "2019-12-31";
	}
	
	$totalQuantity = 0;
	$totalAmount = 0;
	
	
	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	$output = "";
	$query = "
		select SUM(Quantity) as Quantity,
			ROUND(SUM(Total),2) as Total, 
			ItemName,
			invoice.invoicedate,
			invoicedetail.ItemID
			FROM invoicedetail
			join item on invoicedetail.ItemID = item.ItemID
			join invoice on invoicedetail.InvoiceID = invoice.InvoiceID
			WHERE invoice.invoicedate BETWEEN '$from_date' AND '$to_date'
			GROUP by invoicedetail.itemid
			ORDER by quantity DESC";
			
	$result = mysqli_query($connect, $query);
	$output .= "
		<table class='table table-striped text-center px-4'>
				<tr>
				 <th>Item ID</th>
				 <th>Item Name</th>
				 <th>Quantity</th>
				 <th>Total Amount</th>
				</tr>
	";
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result)) 
		{
			$totalQuantity += $row["Quantity"];
			$totalAmount += $row["Total"];
			
			$output .= 
			'
			<tr>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["ItemName"].'</td>
				<td>'.$row["Quantity"].'</td>
				<td>'.$row["Total"].'</td>
			</tr>
			';
		}
		$output .= "
				<tr>
				 <td> </td>
				 <td> <strong> TOTAL </strong> </td>
				 <td> <strong> $totalQuantity </strong></td>
				 <td> <strong> $totalAmount </strong> </td>
				</tr>
				";
	}
	else
	{
		$output .= "
			<tr>
				<td colspan='4'>Nothing found!</td>
			</tr>
		";
	}
	
	$output .= "</table>";
	echo $output;
}
?>