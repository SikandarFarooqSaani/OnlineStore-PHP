<?php
// DATABASE Connection
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'amironlinestore';

$db_connection = mysqli_connect($host, $db_user, $db_password, $db_name);
if(!$db_connection){
	echo 'ERROR in DB Connection'.mysqli_error($db_connection);
}

?>