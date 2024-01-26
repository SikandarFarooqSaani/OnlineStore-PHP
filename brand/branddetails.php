<?php
	include'../include/header.php';//header if not login header location index.php
	
	$brand_name='';
	$brand_details='';
	$brand_id='';
	if(!isset($_GET['brand_id']))// if brand id is not set from get
	{
		header('location:brandlist.php');
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		// get if from get request method
		$brand_id=$_GET['brand_id'];
		//database connnection
		include'../include/dbconnection.php';
		
		
		//get data from database for brand
		$query="SELECT brand_name,brand_details FROM brand WHERE brand_id = $brand_id ";
		$result=mysqli_query($db_connection,$query);
		
		if($result)
		{
			//echo 'fectch';
			
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_assoc($result);
				$brand_name=$row['brand_name'];
				$brand_details=$row['brand_details'];
			}
			else
			{
				//echo 'no brand';
				$brand_name='null';
				$brand_details='null';
			}
				
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Brand Details</h1>
			
			<table>
			<tr>
				<th>Brand Name</th>
				<td><?php echo $brand_name ?></td>
				
			</tr>
			<tr>
				<th>Brand Details</th>
				<td><?php echo $brand_details ?></td>
			</tr>
	</table>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	
	</form>
	
	</center>
	</body>

</html>