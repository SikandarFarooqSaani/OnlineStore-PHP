<?php
	session_start();
	$_SESSION['dir']='../';
	//include'../include/header.php';
	include'../include/topnavbar.php';
	
	$cust_name='';
	$cust_email='';
	$gender='';
	$cust_password='';
	
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
		$cust_name=$_POST['cust_name'];
		$cust_email=$_POST['cust_email'];
		$gender=$_POST['gender'];
		$cust_password=$_POST['cust_password'];
		
		
		
		//query to check if user name already exists
		$query="SELECT cust_name,cust_email FROM customers where cust_email = '$cust_email' ";
		$result=mysqli_query($db_connection,$query);
		//echo 'num of row = ' .mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0)//if record already exists in database
		{
			$row=mysqli_fetch_assoc($result);
			//check email
			if($row['cust_email']==$cust_email)
			{
				//echo 'store email same';
				$error_store_email='this email already exist';
			}
			
			
		}
		else // adding new record to database
		{
			//echo 'inserting new record<br>';
			$query="INSERT INTO customers (cust_name, cust_email, cust_password, gender) VALUES ('$cust_name', '$cust_email', '$cust_password', '$gender')";
			$result=mysqli_query($db_connection,$query);
			if($result)
			{
				//echo 'data save to database';
				//add header location
				$_SESSION['cust_username']=$cust_name;
				header('location:../index.php');
			}
			
		}
		
	}
?>
<html>
	<body>
	<center>
			<h1>Customer Account Signup</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<table>
			<tr>
				<th>Full Name</th>
				<td><input type="text" name="cust_name" required placeholder="enter full name" value="<?php echo $cust_name ?>" ></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="cust_email" required placeholder="name@domain.com" value="<?php echo $cust_email ?>" ></td>
				<td><?php echo $error_store_email ?></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="cust_password" required placeholder="enter password" ></td>
			</tr>
			<tr>
				<th>Gender : </th>
				<td><input type="radio" name="gender" value="male" >male<input type="radio" name="gender" value="female" >female</td>
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