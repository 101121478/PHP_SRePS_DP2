<?php
if(isset($_POST["from_date"], $_POST["to_date"]))
{
	
	$from_date = $_POST["from_date"];
	$to_date = $_POST["to_date"];

	
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
	}
	else
	{
		$output .= "
			<tr>
				<td colspan='4'>Nothing found!</td>
			</tr>
		";
	$output .= "</table>";
	}
	echo $output;
}
?>