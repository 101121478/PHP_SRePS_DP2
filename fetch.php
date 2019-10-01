<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "php_sreps");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM item 
  WHERE itemName LIKE '%".$search."%'
  OR itemDesc LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM item 
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
     <th>Unit Price</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["ItemID"].'</td>
	<td>'.$row["ItemName"].'</td>
	<td>'.$row["ItemName"].'</td>
    <td>'.$row["ItemDesc"].'</td>
    <td>'.$row["ItemPrice"].'</td>
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