<?php
if(isset($_POST["from_date"], $_POST["to_date"]))
{
	
	$from_date = $_POST["from_date"];
	$to_date = $_POST["to_date"];

	
	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	$output = "";
	$query = "
		SELECT COUNT(DISTINCT invoicedetail.invoiceID) as count,
		ROUND(SUM(invoicedetail.Total),2) as total,
		SUM(invoicedetail.Quantity) as quantity,
		item.ItemCategory as category
		from invoicedetail
		join invoice on invoicedetail.invoiceid = invoice.invoiceid
		join item on invoicedetail.itemid = item.itemid
		WHERE InvoiceDate BETWEEN '$from_date' AND '$to_date'
		group by item.itemCategory
		order by quantity DESC";
			
	$result = mysqli_query($connect, $query);
	$output .= "
		<table class='table table-striped text-center'>
				<tr>
				 <th>Category</th>
				 <th>Number of invoices</th>
				 <th>Quantity</th>
				 <th>Total amount</th>
				</tr>
	";
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result)) 
		{
			$output .= 
			'
			<tr>
				<td>'.$row["category"].'</td>
				<td>'.$row["count"].'</td>
				<td>'.$row["quantity"].'</td>
				<td>'.$row["total"].'</td>
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