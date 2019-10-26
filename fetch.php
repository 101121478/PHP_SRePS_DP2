<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "php_sreps");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM item Inner join inventory on item.ItemID = inventory.itemID
  WHERE item.itemName LIKE '%".$search."%'
  OR item.itemDesc LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM item Inner join inventory on item.ItemID = inventory.itemID
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
	 <th>ID</th>
     <th>Name</th>
     <th>Description</th>
	 <th>Catogory</th>
     <th>Unit Price</th>
	 <th>Qty in stock</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["ItemID"].'</td>
	<td>'.$row["ItemName"].'</td>
    <td>'.$row["ItemDesc"].'</td>
	<td>'.$row["ItemCategory"].'</td>
    <td>'.$row["ItemPrice"].'</td>
	<td>'.$row["Current_stock"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?>