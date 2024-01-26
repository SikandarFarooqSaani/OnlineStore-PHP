
<div class="top">

	<a href="<?php echo $_SESSION['dir'] ?>index.php" > Home</a>
	
	<?php
	if(isset($_SESSION['username']) )
	{
		echo '| <a href="'.$_SESSION['dir'] .'store/mystoreproducts.php" > My Store</a> | <a href="'.$_SESSION['dir'] .'product/addnewproduct.php" >Add New Product</a> | <a href="'.$_SESSION['dir'] .'category/addnewcategory.php" >Add New Category</a> | <a href="'.$_SESSION['dir'] .'brand/addnewbrand.php" >Add New Brand</a>';
	}
	?>
	<?php
	if(!isset($_SESSION['username']) && !isset($_SESSION['cust_username']) )
	{
		echo '| <a href=" '.$_SESSION['dir'] .'customer/customersignin.php" > CustomerLogin </a>| <a href=" '.$_SESSION['dir'] .'include/newuser.php" > CustomerSignup </a>';
		echo '| <a href=" '.$_SESSION['dir'] .'store/storelogin.php" > StoreLogin </a>| <a href=" '.$_SESSION['dir'].'include/newuser.php" > StoreSignup </a>';
	}
	?>	
	
	<?php
	if(isset($_SESSION['cust_username']))
	{
		echo '| <a href="'.$_SESSION['dir'] .'customer/cart.php" > cart</a> | <a href="'.$_SESSION['dir'] .'include/logout.php" > Logout</a>';

	}
	?>
	<?php
	if(isset($_SESSION['username']))
	{
		echo '| <a href="'.$_SESSION['dir'] .'include/logout.php" > Logout</a>';
	}
	?>
	
</div>
