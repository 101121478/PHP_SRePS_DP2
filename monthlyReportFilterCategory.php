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
	$numInvoices = 0;	
	
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
			$totalQuantity += $row["quantity"];
			$totalAmount += $row["total"];
			$numInvoices += $row["count"];
			
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
		$output .= "
				<tr>
				 <td> <strong> TOTAL </strong> </td>
				 <td> <strong> $numInvoices </strong> </td>
				 <td> <strong> $totalQuantity </strong> </td>
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