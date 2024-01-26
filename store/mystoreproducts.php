<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';
	include'../include/topnavbar.php';
	//session_start();
	// if(!isset($_SESSION['username']))
	// {
		// header('location:../index.php');
	// }
	$store_username=$_SESSION['username'];
	
?>
<html>
	<body>
	<center>
			<h1>My Store Product List</h1>
			
	<table border="1" width="100%">
			<tr>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Product sale price</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Operations</th>
			</tr>
			
			<?php
				//database connnection
				include'../include/dbconnection.php';
				
				//fetch data from database
				$query="select * from products p inner join store_account s on p.store_id=s.store_id where store_username ='$store_username'";
				$result=mysqli_query($db_connection,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td><img src="' .$_SESSION['dir']. 'product/' . $row['pro_pic'] .' " width="45%" height="10%"></td>';
					echo '<td>' . $row['pro_name'] .'</td>';
					echo '<td>' .$row['pro_qty']. '</td>';
					echo '<td>' .$row['pro_s_price']. '</td>';
						//query for category name by cat_id
						$id=$row['cat_id'];
						$query="SELECT cat_name FROM category WHERE cat_id = $id";
						$category_result=mysqli_query($db_connection,$query);
						$category_row=mysqli_fetch_assoc($category_result);
						echo '<td>' .$category_row['cat_name']. '</td>';
						
						$id=$row['brand_id'];
						//query for brand name by brand_id
						$id=$row['brand_id'];
						$query="SELECT brand_name FROM brand WHERE brand_id = $id";
						$brand_result=mysqli_query($db_connection,$query);
						$brand_row=mysqli_fetch_assoc($brand_result);
						echo '<td>' .$brand_row['brand_name']. '</td>';
					
					echo '<th><a href="'.$_SESSION['dir'] .'product/productdetails.php?pro_id=' . $row['pro_id'] . ' " ' . '>Details</a>  <a href="'.$_SESSION['dir'] .'product/productupdate.php?pro_id=' . $row['pro_id'] . ' " ' . '>Edit</a>  <a href="'.$_SESSION['dir'] .'product/productremove.php?pro_id=' . $row['pro_id'] . ' " ' . '>Remove</a></th>';
					echo '</tr>';
				}
			?>
			
	</table>
	
	</center>
	</body>

</html>