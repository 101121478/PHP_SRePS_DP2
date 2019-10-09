<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add an item</title>
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

	<div class="container"> 
		<h4>Add new item</h4> 
		<form action="addItem.php" method="post" id="Application"> 
			<div class="form-group"> 
				<label for="id1">Item name</label> 
				<input class="form-control" type="text" name="ItemName" id="ItemName" placeholder="Enter the item name"> 
			</div>
			<div class="form-group"> 
				<label for="id1">Item Description</label> 
				<input class="form-control" type="text" name="ItemDesc" id="ItemDesc" placeholder="Enter the item description"> 
			</div> 
			<div class="form-group"> 
				<label for="id2">Item Price</label> 
				<input class="form-control" type="number" step = ".01" name="ItemPrice" id="ItemPrice" placeholder="Enter the item unit price"> 
			</div> 
			<div class="form-group"> 
				<label for="id2">Item Quantity</label> 
				<input class="form-control" type="number" name="ItemQuantity" id="ItemQuantity" placeholder="Enter the item quantity"> 
			</div>
			<div class="form-group"> 
				<label for="id2">Low stock amount</label> 
				<input class="form-control" type="number" name="LowStockAmount" id="LowStockAmount" placeholder="Enter the low stock amount"> 
			</div>
			<div class="form-group"> 
				<label for="id2">Expiry date</label> 
				<input class="form-control" type="date" name="ExpiryDate" id="ExpiryDate" placeholder="Enter the expiry date"> 
			</div>
			<div class="form-group"> 
				<label for="id2">Shelf</label> 
				<input class="form-control" type="text" name="Shelf" id="Shelf" placeholder="Enter the shelf"> 
			</div>
			<div class="container"> 
				<input type="submit" value="Add Item"/>
				<input type="reset" value="Reset"/>
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