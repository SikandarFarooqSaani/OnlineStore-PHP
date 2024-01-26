<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';
	include'../include/topnavbar.php';
	//session_start();
	// if(!isset($_SESSION['username']))
	// {
		// header('location:../index.php');
	// }
	// $store_username=$_SESSION['username'];
	
?>
<html>
	<body>
	<center>
			<h1>Product cart</h1>
			
	<table border="1" width="100%">
			<tr>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>price</th>
				<th>Operations</th>
			</tr>
			
			<?php
				//database connnection
				$cust_id=$_SESSION['cust_id'];
				include'../include/dbconnection.php';
				
				//fetch data from database
				$query="select * from cart where cust_id ='$cust_id'";
				$result=mysqli_query($db_connection,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					//echo 'hello';
					echo '<tr>';
					//echo '<td><img src="' .$_SESSION['dir']. 'product/' . $row['cart_pro_pic'] .' " width="45%" height="10%"></td>';
					echo '<td>' . $row['cart_pro_name'] .'</td>';
					echo '<td>' .$row['cart_pro_qty']. '</td>';
					echo '<td>' .$row['cart_pro_price']. '</td>';
					
					echo '<th></a>  <a href="'.$_SESSION['dir'] .'customer/remove.php?pro_id=' . $row['pro_id'] . ' " ' . '>Remove</a></th>';
					echo '</tr>';
				}
			?>
			
	</table>
	
	</center>
	</body>

</html>