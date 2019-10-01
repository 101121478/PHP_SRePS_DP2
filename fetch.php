<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "php_sreps");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM sales 
  WHERE name LIKE '%".$search."%'
  OR brand LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM sales ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Product name</th>
     <th>Brand</th>
     <th>Quantity</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["brand"].'</td>
    <td>'.$row["quantity"].'</td>
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