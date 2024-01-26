<?php
	include'../include/header.php';//header if not login header location index.php
	
?>
<html>
	<body>
	<center>
			<h1>Category List</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table border="1" width="100%">
			<tr>
				<th>Category Name</th>
				<th>Category Details</th>
				<th>Operations</th>

			</tr>
			<?php
				//database connnection
				include'../include/dbconnection.php';
				
				//fetch data from database
				$query='SELECT * FROM category';
				$result=mysqli_query($db_connection,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td>' . $row['cat_name'] .'</td>';
					echo '<td>' .$row['cat_details']. '</td>';
					echo '<th><a href="categorydetails.php?cat_id=' . $row['cat_id'] . ' " ' . '>Details</a>  <a href="categoryupdate.php?cat_id=' . $row['cat_id'] . ' " ' . '>Edit</th>';
					echo '</tr>';
				}
				
				
			?>
			
	</table>
	</form>
	
	</center>
	</body>

</html>