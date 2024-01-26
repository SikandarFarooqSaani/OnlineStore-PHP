<?php
	//include'../include/header.php';//header if not login header location index.php
	if(!isset($_GET['pro_id']))// if category id is not set from get
	{
		header('location:productlist.php');
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		$pro_id=$_GET['pro_id'];
		//delete product from database of single product id
		$query="Delete FROM products WHERE pro_id = $pro_id ";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			header('location:../store/mystoreproducts.php');
		}
	}
	
?>