<?php
	echo "<h1>Monthly Report</h1>";

	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	
	if(!$connect){
		die(mysql_error());
	}
	
	$day = date("j") - 1;
	
	$sql = mysqli_query($connect, "SELECT invoicedetail.*, invoice.InvoiceDate FROM invoicedetail INNER JOIN invoice ON invoicedetail.InvoiceID=invoice.InvoiceID 
	WHERE DATE_SUB(CURDATE(),INTERVAL $day DAY) <= InvoiceDate ORDER BY InvoiceDate");
	$output = '';
		
		if(mysqli_num_rows($sql) > 0)
			{
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table bordered">
				<tr>
				 <th>Invoice Detail</th>
				 <th>Invoice ID</th>
				 <th>Item ID</th>
				 <th>Quantity</th>
				 <th>Total</th>
				 <th>Invoice Date</th>
				</tr>
			 ';
			 while($row = mysqli_fetch_array($sql))
			 {
			  $output .= '
			   <tr>
				<td>'.$row["InvoiceDetail"].'</td>
				<td>'.$row["InvoiceID"].'</td>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["Quantity"].'</td>
				<td>'.$row["Total"].'</td>
				<td>'.$row["InvoiceDate"].'</td>
			   </tr>
			  ';
			 }
			 echo $output;
			}
			else
			{
			 echo 'Data Not Found';
			}
?>