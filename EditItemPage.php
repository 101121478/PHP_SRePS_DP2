<?php
	include 'editItem.php'
?>

<!DOCTYPE html>

<html>
<head> 
<title>Edit an item</title>
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
		<h2 align="center">Edit an item</h2></br>
		<table class="table">
		<thead>
			<tr>
				<th>Item ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Quantity in stock</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$edit = mysqli_connect("localhost", "root", "", "php_sreps");
				$table = mysqli_query($edit, 'SELECT * FROM item join inventory on item.ItemID=inventory.ItemID');
				while($row = mysqli_fetch_array($table)){ ?>
					<tr id="<?php echo $row['ItemID'];?>">
						<td data-target="ItemID"><?php echo $row['ItemID']; ?></td>
						<td data-target="ItemName"><?php echo $row['ItemName']; ?></td>
						<td data-target="ItemDesc"><?php echo $row['ItemDesc']; ?></td>
						<td data-target="ItemQuantity"><?php echo $row['Current_stock']; ?></td>
						<td data-target="ItemPrice"><?php echo $row['ItemPrice']; ?></td>
						<td><a href="#" data-role="edit" data-id="<?php echo $row['ItemID'];?>">Edit</a></td>
					</tr>
			<?php }
		?>
		</tbody>
</table>
</div>
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Item</h4>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label>Item ID</label>
					<input type="text" id="ItemID" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Item Name</label>
					<input type="text" id="ItemName" class="form-control">
				</div>
				<div class="form-group">
					<label>Item Description</label>
					<input type="text" id="ItemDesc" class="form-control">
				</div>
				<div class="form-group">
					<label>Quantity in stock</label>
					<input type="number" id="ItemQuantity" class="form-control">
				</div>
				<div class="form-group">
					<label>Item Price</label>
					<input type="number" step=".01" id="ItemPrice" class="form-control">
				</div>
			  </div>
			  <div class="modal-footer">
				<a href="#" id="save" class="btn btn-primary pull-right">Save</a>
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
	
</body>
<script>
	$(document).ready(function(){
		$(document).on('click', 'a[data-role=edit]', function() {
			var ItemID = $(this).data('id');
			var ItemName = $('#'+ItemID).children('td[data-target=ItemName]').text();
			var ItemDesc = $('#'+ItemID).children('td[data-target=ItemDesc]').text();
			var ItemQuantity = $('#'+ItemID).children('td[data-target=ItemQuantity]').text();
			var ItemPrice = $('#'+ItemID).children('td[data-target=ItemPrice]').text();
			
			$('#ItemID').val(ItemID);
			$('#ItemName').val(ItemName);
			$('#ItemDesc').val(ItemDesc);
			$('#ItemQuantity').val(ItemQuantity);
			$('#ItemPrice').val(ItemPrice);
			$('#myModal').modal('toggle');		
		});
		
			$('#save').click(function() {
				var ItemID = $('#ItemID').val();
				var ItemName = $('#ItemName').val();
				var ItemDesc = $('#ItemDesc').val();
				var ItemQuantity = $('#ItemQuantity').val();
				var ItemPrice = $('#ItemPrice').val();
				
				$.ajax({
					url : 'editItem.php',
					method : 'post',
					data : {ItemID:ItemID, ItemName:ItemName, ItemDesc:ItemDesc, ItemQuantity:ItemQuantity, ItemPrice:ItemPrice},
					success : function(response) {
						$('#'+ItemID).children('td[data-target=ItemID]').text(ItemID);
						$('#'+ItemID).children('td[data-target=ItemName]').text(ItemName);
						$('#'+ItemID).children('td[data-target=ItemDesc]').text(ItemDesc);
						$('#'+ItemID).children('td[data-target=ItemQuantity]').text(ItemQuantity);
						$('#'+ItemID).children('td[data-target=ItemPrice]').text(ItemPrice);
						$('#myModal').modal('toggle');
					}
				});
			});
		});
		
	
</script>


</html>