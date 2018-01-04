<?php
	require_once 'config.php';
	echo $id = $_GET['id'];
	
	$sql = "DELETE FROM temege WHERE id = " . $id;
	startDB();
	$query = execute_sql_select($sql);
	mysql_fetch_array($query);
	header('Location:temege.php?id=1');
	die;
?>