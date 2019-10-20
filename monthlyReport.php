<!DOCTYPE html>
<html lang="en">
<head>
<title>Sales Report</title>
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

<h2 align="center">Monthly Sales Report</h2>
<div id="weekly-table" class="px-4">
<?php
	$errMsg = "";
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		$output2 = '';
		
		$query2 = "SELECT COUNT(DISTINCT invoicedetail.invoiceID) as count,
		ROUND(SUM(invoicedetail.Total),2) as total,
		SUM(invoicedetail.Quantity) as quantity,
		item.ItemCategory as category
		from invoicedetail
		join invoice on invoicedetail.invoiceid = invoice.invoiceid
		join item on invoicedetail.itemid = item.itemid
		WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= InvoiceDate 
		group by item.itemCategory
		order by quantity DESC"; 
		
		
		$result2 = mysqli_query($connect, $query2);
			if(mysqli_num_rows($result2) > 0)
			{
			 $output2 .= '
			  <div class="table-responsive">
			   <table class="table table-striped text-center">
				<tr>
				 <th>Category</th>
				 <th>Number of invoices</th>
				 <th>Quantity</th>
				 <th>Total amount</th>
				</tr>
				
			 ';
			 while($row = mysqli_fetch_array($result2))
			 {
			  $output2 .= '
			   <tr>
				<td>'.$row["category"].'</td>
				<td>'.$row["count"].'</td>
				<td>'.$row["quantity"].'</td>
				<td>'.$row["total"].'</td>

			   </tr>
			   </div>
			  ';
			 }
			 
			 echo $output2;
			}
			
			echo'<br><br>';
			echo'<h4>Breakdown of sales by category:</h4>';
			
			$query = "select SUM(Quantity) as Quantity,
			ROUND(SUM(Total),2) as Total, 
			ItemName,
			invoice.invoicedate,
			invoicedetail.ItemID
			FROM invoicedetail
			join item on invoicedetail.ItemID = item.ItemID
			join invoice on invoicedetail.InvoiceID = invoice.InvoiceID
			WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= invoice.InvoiceDate
			GROUP by invoicedetail.itemid
			ORDER by quantity DESC";
			
			$result = mysqli_query($connect, $query);
			if(mysqli_num_rows($result) > 0)
			{
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table-striped text-center">
				<tr>
				 <th>Item ID</th>
				 <th>Item Name</th>
				 <th>Quantity</th>
				 <th>Total Amount</th>
				</tr>
				
			 ';
			 while($row = mysqli_fetch_array($result))
			 {
			  $output .= '
			   <tr>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["ItemName"].'</td>
				<td>'.$row["Quantity"].'</td>
				<td>'.$row["Total"].'</td>
			   </tr>
			   </div>
			  ';
			 }
			 
			 echo $output;
			}
			echo'<br><br>';
			echo'<h4>Breakdown of sales by item:</h4>';
	}
?>
</div>
</body>
</html>