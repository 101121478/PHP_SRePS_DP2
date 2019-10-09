<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update a Sales Record</title>
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
		<br />
		<h2 align="center">Edit a sales record</h2></br>
		<table class="table">
		<thead>
			<tr>
				<th>Invoice ID</th>
				<th>Invoice Detail</th>
				<th>Invoice Date</th>
				<th>Item ID</th>
				<th>Item Name</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$edit = mysqli_connect("localhost", "root", "", "php_sreps");
				$table = mysqli_query($edit, 'SELECT * FROM invoice join invoicedetail on invoice.invoiceID=invoicedetail.invoiceID join item on invoicedetail.ItemID=item.ItemID');
				while($row = mysqli_fetch_array($table)){ ?>
					<tr id="<?php echo $row['InvoiceID'];?>">
						<td data-target="InvoiceID"><?php echo $row['InvoiceID']; ?></td>
						<td data-target="InvoiceDetail"><?php echo $row['InvoiceDetail']; ?></td>
						<td data-target="InvoiceDate"><?php echo $row['InvoiceDate']; ?></td>
						<td data-target="ItemID"><?php echo $row['ItemID']; ?></td>
						<td data-target="ItemName"><?php echo $row['ItemName']; ?></td>
						<td data-target="Quantity"><?php echo $row['Quantity']; ?></td>
						<td data-target="Total"><?php echo $row['Total']; ?></td>
						<td><a href="#" data-role="edit" data-id="<?php echo $row['InvoiceID'];?>">Edit</a></td>
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
					<label>Invoice ID</label>
					<input type="number" id="InvoiceID" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Invoice Detail</label>
					<input type="number" id="InvoiceDetail" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Invoice Date</label>
					<input type="date" id="InvoiceDate" class="form-control">
				</div>
				<div class="form-group">
					<label>Item ID</label>
					<input type="number" id="ItemID" class="form-control">
				</div>
				<div class="form-group">
					<label>Item Name</label>
					<input type="text" id="ItemName" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input type="number" id="Quantity" class="form-control">
				</div>
				<div class="form-group">
					<label>Total</label>
					<input type="number" step=".01" id="Total" class="form-control">
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
			var InvoiceID = $(this).data('id');
			var InvoiceDetail = $('#'+InvoiceID).children('td[data-target=InvoiceDetail]').text();
			var InvoiceDate = $('#'+InvoiceID).children('td[data-target=InvoiceDate]').text();
			var ItemID = $('#'+InvoiceID).children('td[data-target=ItemID]').text();
			var ItemName = $('#'+InvoiceID).children('td[data-target=ItemName]').text();
			var Quantity = $('#'+InvoiceID).children('td[data-target=Quantity]').text();
			var Total = $('#'+InvoiceID).children('td[data-target=Total]').text();
			
			$('#InvoiceID').val(InvoiceID);
			$('#InvoiceDetail').val(InvoiceDetail);
			$('#InvoiceDate').val(InvoiceDate);
			$('#ItemID').val(ItemID);
			$('#ItemName').val(ItemName);
			$('#Quantity').val(Quantity);
			$('#Total').val(Total);
			$('#myModal').modal('toggle');		
		});
		
			$('#save').click(function() {
				var InvoiceID = $('#InvoiceID').val();
				var InvoiceDetail = $('#InvoiceDetail').val();
				var InvoiceDate = $('#InvoiceDate').val();
				var ItemID = $('#ItemID').val();
				var ItemName = $('#ItemName').val();
				var Quantity = $('#Quantity').val();
				var Total = $('#Total').val();
				
				$.ajax({
					url : 'updateSaleScript.php',
					method : 'post',
					data : {InvoiceID:InvoiceID, InvoiceDetail:InvoiceDetail, InvoiceDate:InvoiceDate, ItemID:ItemID, ItemName:ItemName, Quantity:Quantity, Total:Total},
					success : function(response) {
						$('#'+InvoiceID).children('td[data-target=InvoiceID]').text(InvoiceID);
						$('#'+InvoiceID).children('td[data-target=InvoiceDetail]').text(InvoiceDetail);
						$('#'+InvoiceID).children('td[data-target=InvoiceDate]').text(InvoiceDate);
						$('#'+InvoiceID).children('td[data-target=ItemID]').text(ItemID);
						$('#'+InvoiceID).children('td[data-target=ItemName]').text(ItemName);
						$('#'+InvoiceID).children('td[data-target=Quantity]').text(Quantity);
						$('#'+InvoiceID).children('td[data-target=Total]').text(Total);
						$('#myModal').modal('toggle');
					}
				});
			});
		});
</script>

</body>
</html>