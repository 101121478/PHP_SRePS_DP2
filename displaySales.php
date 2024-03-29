<!DOCTYPE html>
<html lang="en">
<head>
<title>Sales</title>
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
					<a class="nav-link" href="#">Sales</a>
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

<h2 align="center">Sales</h2>

<script>
	function addSales(){location.assign("addSale.php")}
	function editSales(){location.assign("updateSale.php")}
</script>	

<?php
	$errMsg = "";
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';

		$query = "SELECT invoicedetail.*, invoice.InvoiceDate,item.* FROM invoicedetail  JOIN invoice ON invoicedetail.InvoiceID=invoice.InvoiceID
		JOIN item ON invoicedetail.ItemID=item.ItemID";
		 
		$result = mysqli_query($connect, $query);

			if(mysqli_num_rows($result) > 0)
			{
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table bordered">
				<tr>
				 <th>Invoice ID</th>
				 <th>Item ID</th>
				 <th>Item Name</th>
				 <th>Quantity</th>
				 <th>Total</th>
				 <th>Invoice Date</th>
				</tr>
			 ';
			 while($row = mysqli_fetch_array($result))
			 {
			  $output .= '
			   <tr>
				<td>'.$row["InvoiceID"].'</td>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["ItemName"].'</td>
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
	}
?>
<button class="btn btn-outline-primary" onclick='addSales()'><i ></i>Add Sale Record</button>
<button class="btn btn-outline-primary" onclick='editSales()'><i ></i>Edit Sale Record</button>
</body>
</html>