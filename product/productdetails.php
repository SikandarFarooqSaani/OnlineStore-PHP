<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';//header if not login header location index.php
	include'../include/topnavbar.php';
	$pro_name='';
	$pro_s_price='';
	$pro_qty='';
	$cat_id='';
	$brand_id='';
	$pro_pic='';
	$pro_details='';
	
	if(!isset($_GET['pro_id']))// if product id is not set from get
	{
		header('location:productlist.php');
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		//save add new prodcut data to database
		$pro_id=$_GET['pro_id'];
	
		//fetch all data from database of product
		$query="SELECT * FROM products WHERE pro_id = $pro_id ";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			$row=mysqli_fetch_assoc($result);
			//echo 'data fetch from database';
			$pro_pic=$row['pro_pic'];
			$pro_name=$row['pro_name'];
			$pro_qty=$row['pro_qty'];
			$pro_s_price=$row['pro_s_price'];
			$cat_id=$row['cat_id'];
			$brand_id=$row['brand_id'];
			$pro_details=$row['pro_details'];
		}
	}
?>
<html>
	<body>
	<center>
			<h1>Product Details</h1>
	
	<table>
			<tr>
				<td><img src="<?php echo $pro_pic ?>" ></td>
			</tr>
			<tr>
				<th>Product Name</th>
				<td><?php echo $pro_name ?></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><?php echo $pro_qty ?></td>
			</tr>
			<tr>
				<th>Product sale price</th>
				<td><?php echo $pro_s_price ?></td>
			</tr>
			<tr>
				<th>Category</th>
				<td>
						<!-- fetch category name from database -->
						<?php
							//database connnection
							include'../include/dbconnection.php';
							
							$query="SELECT cat_name FROM category WHERE cat_id = $cat_id";
							$result=mysqli_query($db_connection,$query);
							
							while($row=mysqli_fetch_assoc($result))
							{
								echo $row['cat_name'];
							}
						
						?>
				</td>
			</tr>
			<tr>
				<th>Brand</th>
				<td>
						<!-- fetch brand name from database -->
						<?php
							//database connnection
							include'../include/dbconnection.php';
							
							$query="SELECT brand_name FROM brand WHERE brand_id = $brand_id";
							$result=mysqli_query($db_connection,$query);
							
							while($row=mysqli_fetch_assoc($result))
							{
								echo $row['brand_name'];
							}
						
						?>
				</td>
			</tr>
			<tr>
				<th>Product Details</th>
				<td><?php echo $pro_details ?></td>
			</tr>
			
	</table>
	
	</center>
	</body>

</html>