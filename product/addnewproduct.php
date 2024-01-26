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
	
	$store_id=$_SESSION['store_id'];
	
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
		$query="INSERT INTO products (pro_name, pro_p_price, pro_s_price, pro_pic, pro_code, pro_qty, pro_details, cat_id, brand_id ,store_id) VALUES ('$pro_name','$pro_p_price','$pro_s_price','$pro_pic','$pro_code','$pro_qty','$pro_details','$cat_id','$brand_id','$store_id')";
		$result=mysqli_query($db_connection,$query);
		if($result)
		{
			//echo 'data save to database';
			header('location:../store/mystoreproducts.php');
		}
	}
?>
<html>
	<body>
	<center>
			<h1>Add new Product</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
	
	<table>
			<tr>
				<th>Product Name</th>
				<td><input type="text" name="pro_name" required placeholder="enter Product name" ></td>
			</tr>
			<tr>
				<th>Product Code</th>
				<td><input type="text" name="pro_code" required placeholder="enter Product name" ></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><input type="number" name="pro_qty" required min="1" ></td>
			</tr>
			<tr>
				<th>Product real price</th>
				<td><input type="number" name="pro_p_price" required min="1" ></td>
			</tr>
			<tr>
				<th>Product sale price</th>
				<td><input type="number" name="pro_s_price" required min="1" ></td>
			</tr>
			<tr>
				<th>Category</th>
				<td>
						<select name="cat_id">
						<!-- fetch category list from database -->
						<?php
							//database connnection
							include'../include/dbconnection.php';
							
							$query='SELECT cat_id,cat_name FROM category';
							$result=mysqli_query($db_connection,$query);
							
							while($row=mysqli_fetch_assoc($result))
							{
								echo '<option value=' . $row['cat_id'] . ' >' . $row['cat_name'] . '</option>';
							}
						
						?>
				</td>
			</tr>
			<tr>
				<th>Brand</th>
				<td>
						<select name="brand_id">
						<!-- fetch brand list from database -->
						<?php
							//database connnection
							include'../include/dbconnection.php';
							
							$query='SELECT brand_id,brand_name FROM brand';
							$result=mysqli_query($db_connection,$query);
							
							while($row=mysqli_fetch_assoc($result))
							{
								echo '<option value=' . $row['brand_id'] . ' >' . $row['brand_name'] . '</option>';
							}
						
						?>
				</td>
			</tr>
			<tr>
				<th>Product Image</th>
				<td><input type="file" name="pro_pic" required ></td>
			</tr>
			<tr>
				<th>Product Details</th>
				<td><textarea name="pro_details" required placeholder="enter Product detail" ></textarea></td>
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