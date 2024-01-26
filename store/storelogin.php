<?php
	session_start();
	$_SESSION['dir']='../';
	//include'../include/header.php';
	include'../include/topnavbar.php';
	
	$store_email='';
	$store_password='';
	
	//error variable to display problem
	$error='';
	//$ph_store_password=$_POST['store_password'];
	// if(empty($_POST['brand_name']) && empty($_POST['brand_details']))
	// {
		// echo 'empty';
	// }
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		//save addnewbrand data to database
		$store_email=$_POST['store_email'];
		$store_password=$_POST['store_password'];
		
		
		
		//query to check if user name already exists
		$query="SELECT store_id,store_username,store_email FROM store_account where store_email = '$store_email' and store_password='$store_password'";
		$result=mysqli_query($db_connection,$query);
		//echo 'num of row = ' .mysqli_num_rows($result);
		if(mysqli_num_rows($result)==0)//if record already exists in database
		{
			//check username
			
			$error='email and password not match';
			
		}
		else if(mysqli_num_rows($result)==1) // if one record
		{
			$row=mysqli_fetch_assoc($result);
			$store_username=$row['store_username'];
			$store_id=$row['store_id'];
			//echo 'login successfull';
			//add header location
			$_SESSION['username']=$store_username;
			$_SESSION['store_id']=$store_id;
			header('location:mystoreproducts.php');
			 
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Store Login</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			
			<tr>
				<th>Store Email</th>
				<td><input type="email" name="store_email" required placeholder="enter Store email" value="<?php echo $store_email ?>" ></td>
				
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="store_password" required placeholder="enter Store password" ></td>
			</tr>
			<tr>
				<td></td>
				<td ><input type="submit" value="Register"> <input type="reset" value="Clear"></td>
				<td></td>
				<td><?php echo $error ?></td>
			</tr>
	</table>
	</form>
	
	</center>
	</body>

</html>