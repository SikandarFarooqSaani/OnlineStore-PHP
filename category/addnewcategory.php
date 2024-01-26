<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';//header if not login header location index.php
	include'../include/topnavbar.php';
	$cat_name='';
	$cat_details='';
	// if(empty($_POST['cat_name']) && empty($_POST['cat_details']))
	// {
		// echo 'empty';
	// }
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		//save addnewbrand data to database
		$cat_name=$_POST['cat_name'];
		$cat_details=$_POST['cat_details'];
		
		$query="INSERT INTO category (cat_name,cat_details) VALUES ('$cat_name','$cat_details')";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			//echo 'data save to database';
			header('location:categorylist.php');
		}
	}
?>
<html>
	<body>
	<center>
			<h1>Add new Category</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			<tr>
				<th>Category Name</th>
				<td><input type="text" name="cat_name" required placeholder="enter category name" ></td>
			</tr>
			<tr>
				<th>Category Details</th>
				<td><input type="text" name="cat_details" required placeholder="enter category detail" ></td>
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