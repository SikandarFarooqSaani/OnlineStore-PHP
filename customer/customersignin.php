<?php
	session_start();
	$_SESSION['dir']='../';
	//include'../include/header.php';
	include'../include/topnavbar.php';
	
	$cust_email='';
	$cust_password='';
	
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
		$cust_email=$_POST['cust_email'];
		$cust_password=$_POST['cust_password'];
		
		
		
		//query to check if user name already exists
		$query="SELECT cust_id,cust_email,cust_password,cust_name FROM customers where cust_email = '$cust_email' and cust_password='$cust_password'";
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
			$cust_name=$row['cust_name'];
			$cust_id=$row['cust_id'];
			//echo 'login successfull';
			//add header location
			$_SESSION['cust_username']=$cust_name;
			$_SESSION['cust_id']=$cust_id;
			header('location:../index.php');
			 
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Customer Login</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			
			<tr>
				<th>Email</th>
				<td><input type="email" name="cust_email" required placeholder="email" value="<?php echo $cust_email ?>" ></td>
				
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="" name="cust_password" required placeholder="enter  password" ></td>
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