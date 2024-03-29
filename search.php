<!DOCTYPE html>

<html>
<head> 
<title>Search for an item</title>
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
				<li class="nav-item">
					<a class="nav-link" href="displaySales.php">Sales</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Inventory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reports.php">Reports</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	<div class="container">
		<br />
		<h2 align="center">Search for an item</h2><br />
		<div class="form-group">
		<div class="input-group"> 
		<input type="text" name="search_text" id="search_text" placeholder="Search by Item Details" class="form-control" />
		</div>
		</div>
		<br />
		<div id="result"></div>
		</div>
	
<script>
		$(document).ready(function(){

		 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"fetch.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
			$('#result').html(data);
		   }
		  });
		 }
		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
		});
		</script>
</body>

</html>