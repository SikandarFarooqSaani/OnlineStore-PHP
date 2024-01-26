<?php
	include'../include/header.php';//header if not login header location index.php
	$cat_name='';
	$cat_details='';
	$cat_id='';
	if(!isset($_GET['cat_id']))// if category id is not set from get
	{
		header('location:categorylist.php');
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		// get if from get request method
		$cat_id=$_GET['cat_id'];
		//database connnection
		include'../include/dbconnection.php';
		
		
		//get data from database for category
		$query="SELECT cat_name,cat_details FROM category WHERE cat_id = $cat_id ";
		$result=mysqli_query($db_connection,$query);
		
		if($result)
		{
			//echo 'fectch';
			
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_assoc($result);
				$cat_name=$row['cat_name'];
				$cat_details=$row['cat_details'];
			}
			else
			{
				//echo 'no category';
				$cat_name='null';
				$cat_details='null';
			}
				
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Category Details</h1>
			
			<table>
			<tr>
				<th>Category Name</th>
				<td><?php echo $cat_name ?></td>
				
			</tr>
			<tr>
				<th>Category Details</th>
				<td><?php echo $cat_details ?></td>
			</tr>
	</table>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	
	</form>
	
	</center>
	</body>

</html>