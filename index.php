<?php
	session_start();
	if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
	{
		unset($_SESSION['user_name']);
		unset($_SESSION['user_id']);
		
		session_destroy();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TechQuiz | Home</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />

<script src="js/validations.js"></script>

</head>

<body id="page1">
<div class="header_wrapper">
	<div style="float:left;width:50%;text-indent:-5000px;"> TechQuiz </div>
    <div style="float:left;width:42%;">
    	<ul id="menu">
        	<li id="menu_active"><a href="index.php"> Home </a></li>
            <li><a href="login.php"> Login </a></li>
            <li class="bg_none"><a href="signup.php"> Signup </a></li>
        </ul>
    </div>
	<div style="float:left;width:50%;"> 
    	
        <img src="images/TechQuiz.png"/>
        </div>     
	<div style="float:left;width:50%" id="full_clock"></div>
  <div style="clear:both"></div>
</div>

<div id="footer_wrapper">
<div id="footer"> hello </div>
<div style="clear:both"></div>
</div>
</body>
</html>