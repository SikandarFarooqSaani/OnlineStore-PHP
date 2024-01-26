<html>
	<body>
			<h1>please login or sign up if you are new to this site</h1>
			<?php
			session_start();
			$_SESSION['dir']='../';
			if(!isset($_SESSION['username']) || !isset($_SESSION['cust_username']))
			{
				echo '| <a href=" '.$_SESSION['dir'] .'customer/customersignin.php" > CustomerLogin </a>| <a href=" '.$_SESSION['dir'] .'customer/customersignup.php" > CustomerSignup </a>';
				echo '| <a href=" '.$_SESSION['dir'] .'store/storelogin.php" > StoreLogin </a>| <a href=" '.$_SESSION['dir'].'store/storesignup.php" > StoreSignup </a>';
			}
			?>
	</body>
</html>