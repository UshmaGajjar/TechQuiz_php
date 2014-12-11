<?php 

$file_name=explode("/",$_SERVER['PHP_SELF']);
$page_name=explode(".",$file_name[2]);

echo '
<div class="header_wrapper">
	<div style="float:left;width:50%;text-indent:-5000px;"> TechQuiz </div>
    <div style="float:left;width:42%;">
    	<ul id="menu">
        	<li><a href="index.php"> Home </a></li>
            <li';
			
	if($page_name[0]=="login")
		echo ' id="menu_active"';
			
echo		'><a href="login.php"> Login </a></li>
            <li class="bg_none"';
			
	if($page_name[0]=="signup")
				echo ' id="menu_active"';
			
echo		'><a href="signup.php"> Signup </a></li>
        </ul>
    </div>
	<div style="float:left;width:50%;"> 
    	    
';

?>