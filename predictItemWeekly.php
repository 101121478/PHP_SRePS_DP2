<!DOCTYPE html>
<html lang="en">
<head>
<title>Predicted Individual Item Sales of upcoming week</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>People's Health Pharmacy</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a href="" class="navbar-brand" href="#"><img src="img/logo3.png" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="displaySales.php">Sales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="EditItemPage.php">Inventory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reports.php">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


<?php
	echo "<h1>Predicted sales of inidividual items for next week</h1>";

	$connect = mysqli_connect("localhost", "root", "", "php_sreps");
	
	if(!$connect){
		die(mysql_error());
	}
	
	$sql1 = mysqli_query($connect, "SELECT ItemID, ItemName FROM item");
	$output = '';
		
		if(mysqli_num_rows($sql1) > 0)
			{
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table bordered">
				<tr>
				 <th>Item ID</th>
				 <th>Item Name</th>
				 <th>Predicted Quantity Sold</th>
				 <th>Predicted Sales</th>
				</tr>
			 ';
			 			 
			 while($row = mysqli_fetch_array($sql1))
			 {
				$totalQuantity = 0;
				$totalSales = 0;
				
				$query = "SELECT invoicedetail.ItemID, invoicedetail.Quantity, invoicedetail.Total, invoice.InvoiceDate FROM invoicedetail INNER JOIN invoice ON invoicedetail.InvoiceID=invoice.InvoiceID 
				join item on invoicedetail.ItemID = item.ItemID WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= InvoiceDate AND invoicedetail.ItemID = ".$row['ItemID']." ORDER BY ItemID";
		
				$sql2 = mysqli_query($connect, $query);
					
				while ($table = mysqli_fetch_array($sql2))
				{
					$totalQuantity += $table["Quantity"];
					$totalSales += $table["Total"];
				}
				
				$totalQuantity = $totalQuantity / 4;
				$totalSales = $totalSales / 4;
				
			  $output .= '
			   <tr>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["ItemName"].'</td>
				<td>'.$totalQuantity.'</td>
				<td> $'.round($totalSales, 2).'</td>
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

</body>
</html>