<?php
	session_start();
	//include'../include/header.php';//header if not login header location index.php
	if(!isset($_GET['pro_id']))// if category id is not set from get
	{
		header('location:cart.php');
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		$pro_id=$_GET['pro_id'];
		$cust_id=$_SESSION['cust_id'];
		
		$query="Delete FROM cart WHERE pro_id = $pro_id && cust_id=cust_id";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			header('location:../customer/cart.php');
		}
	}
	
?>