<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';//header if not login header location index.php
	include'../include/topnavbar.php';
	$brand_name='';
	$brand_details='';
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		//save addnewbrand data to database
		$brand_name=$_POST['brand_name'];
		$brand_details=$_POST['brand_details'];
		
		$query="INSERT INTO brand (brand_name,brand_details) VALUES ('$brand_name','$brand_details')";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			echo 'data save to database';
		}
	}
?>
<html>
	<body>
	<center>
			<h1>Add new brand</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			<tr>
				<th>Brand Name</th>
				<td><input type="text" name="brand_name" required placeholder="enter brand name" ></td>
			</tr>
			<tr>
				<th>Brand Details</th>
				<td><input type="text" name="brand_details" required placeholder="enter brand detail" ></td>
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