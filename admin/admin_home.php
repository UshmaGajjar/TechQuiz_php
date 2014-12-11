<?php
	session_start();
	
	if(isset($_SESSION['user_id']) && isset($_SESSION['user_name']))
	{
		$uid=$_SESSION['user_id'];
		$uname=$_SESSION['user_name'];
	}
	else
	{
		header("location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TechQuiz | User Home</title>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<script src="../js/validations.js"></script>

</head>

<body id="user_page1">
<div class="header_wrapper">
	<div style="float:left;width:50%;text-indent:-5000px;"> TechQuiz </div>
    <div style="float:left;width:35%;text-align:right;padding:20px;color:white">
    	Welcome <?php echo $uname;?> ! | <a href="logout.php"><img src="../images/logout.png" /></a>
    </div>
	<div style="float:left;width:50%;"> 
    	
       <img src="../images/TechQuiz.png"/>
       <br /><br /><br /><br /><br />
       <h1>Last played ...</h1>
        </div>     
	<div id="half_clock"></div>
  <div style="clear:both"></div>
</div>
<div class="header_wrapper">
	<div style="float:left;width:65%">
     <iframe id="last_played" src="last_played.php" frameborder="0" height="200px" width="100%"></iframe>
    </div>
	<div id="menu_right"> 
    	<ul id="subject_menu">
        	<li><a href="questions.php?category=2"> Php </a></li><br>
            <li><a href="questions.php?category=1"> .Net </a></li><br>
            <li class="bg_none"><a href="questions.php?category=3"> Data Mining </a></li><br>
        </ul>
         <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>

<div id="footer_wrapper">
<div id="footer"> hello </div>
<div style="clear:both"></div>
</div>
</body>
</html>