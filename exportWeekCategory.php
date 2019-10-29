<?php
if(isset($_POST["from_date_category"]))
{	
	$from_date = $_POST["from_date_category"];
	$to_date = $_POST["to_date_category"];


	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	
	$query = "SELECT COUNT(DISTINCT invoicedetail.invoiceID) as num_invoices,
		ROUND(SUM(invoicedetail.Total),2) as total,
		SUM(invoicedetail.Quantity) as quantity,
		item.ItemCategory as category
		from invoicedetail
		join invoice on invoicedetail.invoiceid = invoice.invoiceid
		join item on invoicedetail.itemid = item.itemid
		WHERE invoice.InvoiceDate BETWEEN '$from_date' AND '$to_date' 
		group by item.itemCategory
		order by quantity DESC";
		
		function mysqli_field_name($result, $field_offset)
		{
			$properties = mysqli_fetch_field_direct($result, $field_offset);
			return is_object($properties) ? $properties->name : null;
		}
		
	$result = mysqli_query($connect, $query);
	$number_of_fields = mysqli_num_fields($result);
	$headers = array();
	for ($i = 0; $i < $number_of_fields; $i++) {
		$headers[] = mysqli_field_name($result , $i);
	}
	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="export.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		fputcsv($fp, $headers);
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
		}
		die;
	}
}
?>