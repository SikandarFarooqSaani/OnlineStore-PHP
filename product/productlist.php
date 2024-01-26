<?php
	session_start();
	$_SESSION['dir']='../';
	include'../include/header.php';//header if not login header location index.php
	include'../include/topnavbar.php';
	$target_dir='files/';
	$pro_name='';
	$pro_p_price='';
	$pro_s_price='';
	$pro_code='';
	$pro_qty='';
	$cat_id='';
	$brand_id='';
	$pro_pic='';
	$pro_details='';
	
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//database connnection
		include'../include/dbconnection.php';
		
		//save add new prodcut data to database
		$pro_name=$_POST['pro_name'];
		$pro_code=$_POST['pro_code'];
		$pro_qty=$_POST['pro_qty'];
		$pro_p_price=$_POST['pro_p_price'];
		$pro_s_price=$_POST['pro_s_price'];
		$cat_id=$_POST['cat_id'];
		$brand_id=$_POST['brand_id'];
		$pro_details=$_POST['pro_details'];
		//file move
		$pro_pic_oldname=$_FILES['pro_pic']['name'];
		//echo $_FILES['pro_pic']['tmp_name'];
		$pro_pic_temp_path=$_FILES['pro_pic']['tmp_name'];
		//generate new name for same files
		$pro_pic_new_name='pic' . date('ymdhisa') . $pro_pic_oldname;
		
		move_uploaded_file($pro_pic_temp_path,'files/'.$pro_pic_new_name);
		$pro_pic='files/'.$pro_pic_new_name;
		
		//save all data to database of product
		$query="INSERT INTO products (pro_name, pro_p_price, pro_s_price, pro_pic, pro_code, pro_qty, pro_details, cat_id, brand_id ,store_id) VALUES ('$pro_name','$pro_p_price','$pro_s_price','$pro_pic','$pro_code','$pro_qty','$pro_details','$cat_id','$brand_id','1')";
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
			<h1>Product List</h1>
			
	<table border="1" width="100%">
			<tr>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Product sale price</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Operations</th>
			</tr>
			
			<?php
				//database connnection
				include'../include/dbconnection.php';
				
				//fetch data from database
				$query='SELECT * FROM products';
				$result=mysqli_query($db_connection,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td><img src="' . $row['pro_pic'] .'"></td>';
					echo '<td>' . $row['pro_name'] .'</td>';
					echo '<td>' .$row['pro_qty']. '</td>';
					echo '<td>' .$row['pro_s_price']. '</td>';
						//query for category name by cat_id
						$id=$row['cat_id'];
						$query="SELECT cat_name FROM category WHERE cat_id = $id";
						$category_result=mysqli_query($db_connection,$query);
						$category_row=mysqli_fetch_assoc($category_result);
						echo '<td>' .$category_row['cat_name']. '</td>';
						
						$id=$row['brand_id'];
						//query for brand name by brand_id
						$id=$row['brand_id'];
						$query="SELECT brand_name FROM brand WHERE brand_id = $id";
						$brand_result=mysqli_query($db_connection,$query);
						$brand_row=mysqli_fetch_assoc($brand_result);
						echo '<td>' .$brand_row['brand_name']. '</td>';
					
					echo '<th><a href="productdetails.php?pro_id=' . $row['pro_id'] . ' " ' . '>Details</a>  <a href="productupdate.php?pro_id=' . $row['pro_id'] . ' " ' . '>Edit</a>  <a href="productremove.php?pro_id=' . $row['pro_id'] . ' " ' . '>Remove</a></th>';
					echo '</tr>';
				}
			?>
			
	</table>
	
	</center>
	</body>

</html>