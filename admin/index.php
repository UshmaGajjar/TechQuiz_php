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
<title>TechQuiz | Admin Login</title>
<style type="text/css">
body
{
	margin:0;
	padding:110px;
	background:url(../images/back.png) no-repeat center;
	color:#38294a;
	letter-spacing:1.5px;
	font:15px Arial, Helvetica, sans-serif;
}
.button
{
	border-style:solid;
	border: 2px solid rgba(200,200,200,1);
	font-weight:bold;
	height:30px;
	width:80px;
}
#login
{
	background-color: #38294a;
	color:rgba(255,255,255,1);
}
#login:hover
{
	background-color: rgba(240,240,240,1);
	color: #38294a;
	cursor:pointer;
}

.textbox
{
	background-repeat:no-repeat;
	padding-left:30px;
	height:30px;
	border-radius: 5px 5px 5px 5px;
	width:200px;
	letter-spacing:2px;
	font-size:15px;
}
.textbox:focus
{
	border: 1px solid rgba(200,0,0,1);
}
/* awesomw blue : rgba(39,32,104,1) */
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="action.php">

	<div style="height: 75px; width:310px; margin:0 auto;" >
     	<div style="float:left;padding:10px 5px 10px 0px"><img src="../images/techquiz.png" width="200"/></div>
     	</div>
    <div style="width:299px; background-color:rgba(250,250,250,1);border-radius:0px 52px 0px 52px;margin:0 auto;padding:1px;border: 2px solid #38294a;">  
    <div style="width:235px; background-color:rgba(225,225,225,1);border-radius:0px 50px 0px 50px;margin:0 auto;padding:30px;border: 2px solid rgba(0,0,0,0.4);">  
    
      <div style="float:left;">

		<div style="height:35px; width:auto;text-align:right">
              <b>| ADMIN SIGN IN |</b>
		</div>
	    <div style="height:50px; width:auto">
              <input type="text" name="name" id="uname" placeholder="Enter your username" class="textbox" style="background-image:url('../images/user_.png');"/>
		</div>
		
		<div style="height:50px;width:auto">
        <input type="password" name="pass" id="upass" placeholder="Enter Password" class="textbox" style="background-image:url('../images/pass_.png');"/>
  		</div>
  		
  		<div style="height:29px; width:233px">
  			<div style="float:right;padding-top:20px"> <button  type="submit" name="submit" class="button"  value="admin_login" id="login">SIGN IN</button></div>   
  		</div>
  		
       </div>
  	<div style="clear:both"/>
	</div>
	<div style="clear:both"/>
	</div>
</form>
</body>
</html>