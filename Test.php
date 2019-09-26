<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Manager</title>
</head>

<body>
	
<?php
	require_once ("settings.php");
	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);

	if (!$conn) {
		echo "<p>Database connection failure</p>";
	} else {
		
		$result = mysqli_query($conn, "UPDATE TestTable SET Test1='NewTestValue1'");
	
		$query = "SELECT * FROM TestTable";
				
		$result = mysqli_query($conn, $query);
				
			if (!$result) {
				echo "<p>Something is wrong with ". $query, "</p>";
			} else {
				echo "<p></p>";
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					 ."<th scope=\"col\">Test1</th>\n "
					 ."<th scope=\"col\">Test2</th>\n "
					 ."<th scope=\"col\">Test3</th>\n "
					 ."<th scope=\"col\">Test4</th>\n "
					 ."</tr>\n ";
					 
				while ($row = mysqli_fetch_assoc($result)){
					echo "<tr>\n ";
					echo "<td>",$row["Test1"],"</td>\n ";
					echo "<td>",$row["Test2"],"</td>\n ";
					echo "<td>",$row["Test3"],"</td>\n ";
					echo "<td>",$row["Test4"],"</td>\n ";
					echo "</tr>\n ";
				}
				echo "</table>\n";
				mysqli_free_result($result);
				}
			
				mysqli_close($conn);
			}
?>
</body>
</html>
