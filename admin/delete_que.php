<?php
	include "connect_db.php";
	$db_con=new connection;
	$con=$db_con->connect();
	
	$con=$db_con->delete_que($_GET['que_id']);
	
	header("location:questions.php");
?>