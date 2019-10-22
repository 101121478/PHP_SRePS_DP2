<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports</title>
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
				<li class="nav-item">
					<a class="nav-link" href="displaySales.php">Sales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="EditItemPage.php">Inventory</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="reports.php">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Reports</h1>
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
			<button class="button" onclick="addPage()"><i class="fas fa-chart-line"></i></button>
			<h3>Weekly report</h3>
			<p>View weekly reports</p>
			<script>
				function addPage(){location.assign("weeklyReport.php")}
			</script>	
		</div>
		<div class="col-sm-12 col-sm-6 col-md-4">
			<button class="button" onclick="report()"><i class="fas fa-chart-line"></i></button>
			<h3>Monthly report</h3>
			<p>View monthly reports</p>
			<script>
				function report(){location.assign("monthlyReport.php")}
			</script>
		</div>
		<div class="col-sm-12 col-sm-6 col-md-4">
			<button class="button" onclick="predItemWeekly()"><i class="fas fa-chart-line"></i></button>
			<h3>Item sales predictions</h3>
			<p>Sales Predictions of Inidvidual Items for Upcoming Week</p>
			<script>
				function predItemWeekly(){location.assign("predictItemWeekly.php")}
			</script>
		</div>
	</div>
	<hr class="my-4">
</div>
</body>
</html>













