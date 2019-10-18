<?php
$connect = mysqli_connect("localhost", "root", "", "php_sreps");
$output = '';
$day = date("j") - 1;
$query = "SELECT invoicedetail.*, invoice.InvoiceDate, item.* FROM invoicedetail INNER JOIN invoice ON invoicedetail.InvoiceID=invoice.InvoiceID join item on invoicedetail.ItemID = item.ItemID
		WHERE DATE_SUB(CURDATE(),INTERVAL $day DAY) <= InvoiceDate ORDER BY InvoiceDate";

$result = mysqli_query($connect, $query);
			if(mysqli_num_rows($result) > 0){
    $delimiter = ",";
    $filename = "MonthReport" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ItemID', 'ItemName', 'ItemDesc', 'Current_stock', 'ItemPrice');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['ItemID'], $row['ItemName'], $row['ItemDesc'], $row['Current_stock'], $row['ItemPrice'], $status);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>