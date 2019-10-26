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

<h2 align="center">Weekly Sales Report</h2>

<form class="m-4">
  <fieldset>
    <div class="form-group">
	  <label>Start date</label>
      <input type="text" name="from_date" id="from_date"/>
    </div>
    <div class="form-group">
	<label>End date</label>
      <input type="text" name="to_date" id="to_date"/>
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
			var from_date = $("#from_date").val();
			var to_date =  $("#to_date").val();
			if(from_date != "" && to_date != "") {
				$.ajax({
					url:"weeklyReportFilterItem.php",
					method:"POST",
					data: 
					{
						from_date:from_date, to_date:to_date
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
			} else {
				alert("Please select date");
			}
			});
			$('#category_button').click(function() {
			var from_date = $("#from_date").val();
			var to_date =  $("#to_date").val();
			if(from_date != "" && to_date != "") {
				$.ajax({
					url:"weeklyReportFilterCategory.php",
					method:"POST",
					data: 
					{
						from_date:from_date, to_date:to_date
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
			} else {
				alert("Please select date");
			}
			});
	});
</script>
