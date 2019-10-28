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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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

<!-- <form class="form-inline">
	<div class="col-md-3">
		<input type="text" name="from_date" id="from_date"/>
	</div>

	<div class="col-md-3">
		<input type="text" name="to_date" id="to_date"/>
	</div>

	<div class="col-md-5">
		<input type="button" name="filter" id="item_button" value="View by items" class="btn btn-primary"/>
	</div>
	
	<div class="col-md-5">
		<input type="button" name="filter" id="category_button" value="View by cateogory" class="btn btn-primary"/>
	</div>
</form>
-->
<form class="m-4">
  <fieldset>
 
	<div class="form-group" style="width:10rem;">
	<label>Select month:</label>
		<select class="form-control" id="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
	</div>
    <input type="button" name="filter" id="item_button" value="View by items" class="btn btn-primary"/>
	<input type="button" name="filter" id="category_button" value="View by category" class="btn btn-primary"/>
  </fieldset>
</form>

<div class="table-responsive" id="report_table_item">
</div>

 <div class="table-responsive"id="report_table_category">
</div>
</body>
</html>

<script>
	$(document).ready(function() {
		$.datepicker.setDefaults({
			dateFormat:'yy-mm-dd'
		})
		$(function() {
			$("#from_date").datepicker();
			$("#to_date").datepicker();
		});
		
		$('#item_button').click(function() {
				$.ajax({
					url:"monthlyReportFilterItem.php",
					method:"POST",
					data: 
					{
						month:$("#month").val()
					},
					success:function(data)
					{
						$("#report_table_item").html(data);
						$("#report_table_category").html("");
						console.log(data.d);
						
					},
					error: function ()
					{ alert('ERROR: Unable to generate reports'); }
				});
			});
		
			$('#category_button').click(function() {
				$.ajax({
					url:"monthlyReportFilterCategory.php",
					method:"POST",
					data: 
					{
						month:$("#month").val()
					},
					success:function(data)
					{
						$("#report_table_item").html("");
						$("#report_table_category").html(data);
						console.log(data.d);
						
					},
					error: function ()
					{ alert('ERROR: Unable to generate reports'); }
				});
			});
	});
</script>
