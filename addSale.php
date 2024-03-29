<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add a sale</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
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
	<div class="container"> 
		<h4>Add new sale record</h4> 
		<form action="addSaleScript.php" method="post" id="Application"> 
			<div class="form-group"> 
				<label for="InvoiceID">Invoice ID</label> 
				<input class="form-control" type="number" name="InvoiceID" id="InvoiceID" placeholder="Enter the invoice id"> 
			</div> 
			<div class="form-group"> 
				<label for="ItemID">Item ID</label> 
				<input class="form-control" type="number" step = ".01" name="ItemID" id="ItemID" placeholder="Enter the item id"> 
			</div> 
			<div class="form-group"> 
				<label for="Quantity">Quantity</label> 
				<input class="form-control" type="number" name="Quantity" id="Quantity" placeholder="Enter the quantity"> 
			</div>
			<div class="form-group"> 
				<label for="Total">Total</label> 
				<input class="form-control" type="float" name="Total" id="Total" placeholder="Enter the total cost"> 
			</div>
			<div class="form-group"> 
				<label for="InvoiceDate">Invoice Date</label> 
				<input class="form-control" type="date" name="InvoiceDate" id="InvoiceDate" placeholder="Enter the invoice date"> 
			</div>
			<div class="container"> 
				<input type="submit" class="btn-outline-primary" value="Add Sale"/>
				<input type="reset" class="btn-outline-primary" value="Reset"/>
			</div>
			
		</form> 
	</div> 
	<div>
		<p id="result" align='center'></p>
	</div>
	<script>
	$("#Application").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               $('#result').html(data); // show response from the php script.
           }
         });
	});
	</script>

</body
</html>