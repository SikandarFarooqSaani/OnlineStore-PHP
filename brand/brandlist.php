<?php
	include'../include/header.php';//header if not login header location index.php
	
?>
<html>
	<body>
	<center>
			<h1>Brand List</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table border="1" width="100%">
			<tr>
				<th>Brand Name</th>
				<th>Brand Details</th>
				<th>Operations</th>

			</tr>
			<?php
				//database connnection
				include'../include/dbconnection.php';
				
				//fetch data from database
				$query='SELECT * FROM brand';
				$result=mysqli_query($db_connection,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td>' . $row['brand_name'] .'</td>';
					echo '<td>' .$row['brand_details']. '</td>';
					echo '<th><a href="branddetails.php?brand_id=' . $row['brand_id'] . ' " ' . '>Details</a>  <a href="brandupdate.php?brand_id=' . $row['brand_id'] . ' " ' . '>Edit</th>';
					echo '</tr>';
				}
				
				
			?>
			
	</table>
	</form>
	
	</center>
	</body>

</html>