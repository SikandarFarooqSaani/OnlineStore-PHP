<?php
	session_start();
	$_SESSION['dir']='../';
	if(isset($_SESSION['username']))
	{
		header('location:../index.php');
	}
	include'../include/topnavbar.php';
	
	$store_name='';
	$store_username='';
	$store_email='';
	$store_password='';
	$store_user_type='';
	
	//error variable to display problem
	$error_store_name='';
	$error_store_username='';
	$error_store_email='';
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
		$store_name=$_POST['store_name'];
		$store_username=$_POST['store_username'];
		$store_email=$_POST['store_email'];
		$store_password=$_POST['store_password'];
		$store_user_type=$_POST['store_user_type'];
		
		
		
		//query to check if user name already exists
		$query="SELECT store_username,store_email FROM store_account where store_username = '$store_username' or store_email='$store_email'";
		$result=mysqli_query($db_connection,$query);
		//echo 'num of row = ' .mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0)//if record already exists in database
		{
			//check username
			$row=mysqli_fetch_assoc($result);
			if($row['store_username']==$store_username)
			{
				//echo 'store name same';
				$error_store_username='user name already exist';
			}
			//check email
			if($row['store_email']==$store_email)
			{
				//echo 'store email same';
				$error_store_email='this email already exist';
			}
			
			
		}
		else // adding new record to database
		{
			//echo 'inserting new record<br>';
			$query="INSERT INTO store_account (store_name, store_username, store_email, store_password, store_user_type) VALUES ('$store_name', '$store_username', '$store_email', '$store_password', '$store_user_type')";
			$result=mysqli_query($db_connection,$query);
			if($result)
			{
				//echo 'data save to database';
				//add header location
				$_SESSION['username']=$store_username;
				$_SESSION['store_id']=$store_id:
				
				header('location:mystoreproducts.php');
			}
			
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Online Store Signup</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			<tr>
				<th>Store Name</th>
				<td><input type="text" name="store_name" required placeholder="enter Store name" value="<?php echo $store_name ?>" ></td>
			</tr>
			<tr>
				<th>Store username</th>
				<td><input type="text" name="store_username" required placeholder="enter Store name" value="<?php echo $store_username ?>" ></td>
				<td><?php echo $error_store_username ?></td>
			</tr>
			<tr>
				<th>Store Email</th>
				<td><input type="email" name="store_email" required placeholder="enter Store email" value="<?php echo $store_email ?>" ></td>
				<td><?php echo $error_store_email ?></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="store_password" required placeholder="enter Store password" ></td>
			</tr>
			<tr>
				<th>Account Type</th>
				<th><select name="store_user_type" required >
				<option value="">choose one value</option>
				<option value="regular">Regular Seller</option>
				<option value="whole">Whole Seller</option>
				</select></th>
				
			</tr>
			<tr>
				<td></td>
				<td ><input type="submit" value="Register"> <input type="reset" value="Clear"></td>
				<td></td>
			</tr>
	</table>
	</form>
	
	</center>
	</body>

</html>