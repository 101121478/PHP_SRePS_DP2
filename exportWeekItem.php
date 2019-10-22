<?php
if(isset($_POST["exportWeekItem"]))
{
	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	
	$query = "select SUM(Quantity) as Quantity,
			ROUND(SUM(Total),2) as Total, 
			ItemName,
			invoice.invoicedate,
			invoicedetail.ItemID
			FROM invoicedetail
			join item on invoicedetail.ItemID = item.ItemID
			join invoice on invoicedetail.InvoiceID = invoice.InvoiceID
			WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= invoice.InvoiceDate
			GROUP by invoicedetail.itemid
			ORDER by quantity DESC";
		
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