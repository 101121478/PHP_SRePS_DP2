<?php
if(isset($_POST["monthChosen2"]))
{	
	$month = $_POST["monthChosen2"];
	
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


	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	
	$query = "select SUM(Quantity) as Quantity,
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