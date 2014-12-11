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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>TechQuiz | Login</title>

<link href="css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/validations.js"></script>
</head>

<body id="page2">

<?php include "header.php";?>

<form method="post" name="form1"  onsubmit="return validate_login()" action="action.php">
<table class="login" cellpadding="5" cellspacing="5">
<tr>
	<td colspan="2" align="center"><span id="message"></span></td>
</tr>
<tr>
	<td><input type="text" name="uname" id="uname" placeholder="Username" onblur="focusOut(this.id)" onfocus="focusIn(this.id)"/></td>
</tr>
<tr>
	<td><input type="password" name="password" id="password" placeholder="Password" onblur="focusOut(this.id)" onfocus="focusIn(this.id)"/></td>
</tr>
<tr>
	<td><button type="submit" name="submit" id="login" value="login">LOGIN</button></td>
</tr>
</table>
</form>
	  </div>
      <div style="float:left;width:50%" id="full_clock"></div>
  <div style="clear:both"></div>
</div>
</body>
</html>
