<?php
	include'../include/header.php';//header if not login header location index.php
	$cat_name='';
	$cat_details='';
	$cat_id='';
	
	if(!isset($_GET['cat_id']))// if category id is not set from get
	{
		header('location:categorylist.php');
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$cat_name=$_POST['cat_name'];
		$cat_details=$_POST['cat_details'];
		$cat_id=$_POST['cat_id'];
		//post method to update the brand values
		//database connnection
		include'../include/dbconnection.php';
		
		$query="UPDATE category SET cat_name= '$cat_name' , cat_details='$cat_details' WHERE cat_id=$cat_id";
		
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			echo 'category name updated';
			header('location:categorylist.php');
		}
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
			<h1>Update Category</h1>
			
			
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
		<table>
				<input type="hidden" name="cat_id" value="<?php echo $cat_id ?>">
			<tr>
				<th>Category Name</th>
				<td><input type="text" name="cat_name" required placeholder="enter Category name" value="<?php echo $cat_name ?>"></td>
				
				
			</tr>
			<tr>
				<th>Category Details</th>
				<td><input type="text" name="cat_details" required placeholder="enter Category detail" value="<?php echo $cat_details ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td ><input type="submit" value="save"> <input type="reset" value="clear"></td>
				<td></td>
			</tr>
			
		</table>
	
	</form>
	
	</center>
	</body>

</html>