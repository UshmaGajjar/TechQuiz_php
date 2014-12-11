<?php
	include "connect_db.php";
	
	if(isset($_POST['submit']))
	{
		$db_con=new connection;
		$con=$db_con->connect();
		
		if($_POST['submit']== 'admin_login')
		{
			$db_con->check_login($_POST['name'],sha1($_POST['pass']));
		}	
		else if($_POST['submit'] == 'add_new_que')
		{
			session_start();
			$cat=$_SESSION["cat"];
			
			$db_con->insert_que($cat);
			
			header("location:questions.php");
		}
		else if($_POST['submit'] == 'save_que')
		{
			$db_con->update_que();
			
			header("location:questions.php");
		}
	}
?>