<!DOCTYPE html>
<html lang="en">
<head>
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
				<li class="nav-item active">
					<a class="nav-link" href="index.html">Home</a>
				</li>
				<li class="nav-item">
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

<?php

	if (isset ($_POST["ItemName"])) {
		$itemName = $_POST["ItemName"];
		$_SESSION['ItemName'] = $itemName;
	}
	else {
		echo "<p>Item Name Required</p>";
	}
	
	if (isset ($_POST["ItemDesc"])) {
		$itemDesc = $_POST["ItemDesc"];
		$_SESSION['ItemDesc'] = $itemDesc;
	}
	else {
		echo "<p>Item Description Required</p>";
	}
	
	if (isset ($_POST["ItemPrice"])) {
		$itemPrice = $_POST["ItemPrice"];
		$_SESSION['ItemPrice'] = $itemPrice;
	}
	else {
		echo "<p>Item Price Required</p>";
	}

	$errMsg = "";

	if($itemName == "")
	{
		$errMsg = "<p>Item name required</p>";
	}
	
	if($itemDesc == "")
	{
		$errMsg .= "<p>Item description required</p>";
	}
	
	if($itemPrice == "")
	{
		$errMsg .= "<p>Item price required</p>";
	}
	
	if($errMsg != "")
	{
		echo $errMsg;
	} else {
		//fetch.php
		$connect = mysqli_connect("localhost", "root", "", "php_sreps");
		$output = '';
		//if(isset($_POST["query"]))
		//{
		// $search = mysqli_real_escape_string($connect, $_POST["query"]);
		 
		 $query = "INSERT INTO item(ItemName, ItemDesc, ItemPrice) VALUES ('$itemName', '$itemDesc', '$itemPrice')";
		//}
		$result = mysqli_query($connect, $query);
		
		if($result > 0)
		{
			$message = "$itemName has successfully been added!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		
			$query = "SELECT * FROM item ORDER BY ItemID";
			//}
			$result = mysqli_query($connect, $query);
			
			if(mysqli_num_rows($result) > 0)
			{
			 $output .= '
			  <div class="table-responsive">
			   <table class="table table bordered">
				<tr>
				 <th>itemID</th>
				 <th>itemName</th>
				 <th>itemDesc</th>
				 <th>itemPrice</th>
				</tr>
			 ';
			 while($row = mysqli_fetch_array($result))
			 {
			  $output .= '
			   <tr>
				<td>'.$row["ItemID"].'</td>
				<td>'.$row["ItemName"].'</td>
				<td>'.$row["ItemDesc"].'</td>
				<td>'.$row["ItemPrice"].'</td>
			   </tr>
			  ';
			 }
			 echo $output;
			}
			else
			{
			 echo 'Data Not Found';
			}
	} else {
		echo "An error has occured while adding the new item";
	}
	}

?>
</body
</html>