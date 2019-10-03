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
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="displaySales.php">Sales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="search.html">Inventory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="showweek.html">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">People's Health Pharmacy</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Our mission: To provide the best possible service we can to ensure that all your professional health requirements are met with excellence.</p>
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
				function search(){location.assign("search.html")}
			</script>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<button class="button" onclick="addPage()"><i class="fas fa-plus"></i></button>
			<h3>Add</h3>
			<p>Add an item</p>
			<script>
				function addPage(){location.assign("createItem.html")}
			</script>	
		</div>
		<div class="col-sm-12 col-sm-6 col-md-4">
			<button class="button" onclick="report()"><i class="fas fa-chart-line"></i></button>
			<h3>View Report</h3>
			<p>View sales reports</p>
			<script>
				function report(){location.assign("showweek.html")}
			</script>
		</div>
	</div>
	<hr class="my-4">
</div>
</body>
</html>













