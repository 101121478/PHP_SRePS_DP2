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
					<a class="nav-link" href="index.html">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Sales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="search.html">Inventory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<h2 align="center">Weekly Sales Report</h2>

<?php
	$errMsg = "";
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table bordered">
				<tr>
				 <th>Invoice Date</th>
				 <th>Invoice ID</th>
				</tr>
			 ';
		$date = '2019-01-01';
		for ($x = 0; $x <= 53; $x++) 
		{
			$query = "SELECT * FROM invoice WHERE InvoiceDate > $date AND InvoiceDate < DATE_ADD($date, INTERVAL 1 WEEK) ORDER BY InvoiceID";
			
			$result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($result))
			 {
			  $output .= '
			   <tr>
				<td>'.$row["InvoiceDate"].'</td>
				<td>'.$row["InvoiceID"].'</td>
			   </tr>
			  ';
			 }
			$result2 = mysqli_query($connect, "SELECT DATE_ADD($date, INTERVAL 1 WEEK");
			$row = mysqli_fetch_row($result2);
			$date = $row[0];
			echo $output;
		}
	}
?>
</body>
</html>