<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory</title>
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
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="sales.php">Sales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="search.html">Inventory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="getReports.html">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Inventory</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Please select one of the following options:</p>
		</div>
	</div>
</div>

<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-4">
			<button class="button" onclick="search()"><i class="fas fa-search"></i></button>
			<h3>Search</h3>
			<p>Search for an item</p>
			<script>
				function search(){location.assign("search.php")}
			</script>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<button class="button" onclick="EditInventory()"><i class="fas fa-edit fa-5x"></i></button>
			<h3>Edit inventory</h3>
			<p>Edit details of items in inventory</p>
			<script>
				function EditInventory(){location.assign("EditItemPage.php")}
			</script>	
		</div>
	</div>
	<hr class="my-4">
</div>
</body>
</html>













