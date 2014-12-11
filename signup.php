<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/validations.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
</head>

<body id="page2">

<?php  include "header.php";?>
<form method="post" onsubmit="return validate_registeration()" action="action.php">
<table width="297" cellpadding="5" cellspacing="5" class="register">
	<tr><td colspan="2">Name :<br />
    	<input type="text" name="fname" id="fname" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" placeholder="First Name"/><br/><br/>
            <input type="text" name="lname" id="lname" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" placeholder="Last Name"/> </td>
    </tr>
    <tr><td colspan="2">Email ID :<br />
    		<input type="text" name="email" id="email" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" placeholder="Your email-ID"/></td></tr>
    <tr><td colspan="2">Password :<br />
    		<input type="password" name="passwd1" id="passwd1" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" placeholder="Your password"/></td></tr>
	<tr><td colspan="2">Retype Password : <br/>
    		<input type="password" name="passwd2" id="passwd2" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" placeholder="Retype password"/></td></tr>
    <tr><td width="111">Occupation : <br />
    		<select name="occupation" id="occupation" onblur="focusOut(this.id)" onfocus="focusIn(this.id)">
            	<option value="0"> - SELECT - </option>
            	<option value="1"> Student </option>
            	<option value="2"> Employee </option>               
            	<option value="3"> Professional </option>                
            </select></td>
      <td width="160"> Gender : <br />
      		<input type="radio" name="gender" value="f"/>Female
            <input type="radio" name="gender" value="m"/>Male
      </td>
      
    </tr>
	<tr>
    	<td colspan="2">Birth Date : <br />
      		<select name="year" id="year" onChange="checkYear()" onblur="focusOut(this.id)" onfocus="focusIn(this.id)">
			<option value="0"> &nbsp; YEAR  &nbsp; </option>
			<?php
				$year="20".date("y");
				for($i=1920;$i<=$year;$i++)
					echo "<option value='".$i."'>". $i."</option>";
			?>
		         </select> 

		          <select name="month" id="month" onChange="checkMonth()" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" disabled>
			<option value="0" selected>  &nbsp;  MONTH &nbsp; </option> 
			 <?php
				for($i=1;$i<=12;$i++)
					echo "<option value='".$i."'>". $i."</option>";
			?>
		        </select> 
			
		       <select name="day" id="day" onblur="focusOut(this.id)" onfocus="focusIn(this.id)" disabled>
			<option value=0> &nbsp;  DAY  &nbsp; </option>
		       </select> 
      </td>
    </tr>        
    <tr><td colspan="2"><button type="reset" value="reset" name="reset"> RESET</button> 
     &nbsp; &nbsp; &nbsp; <button name="submit" type="submit" value="signup" > SIGNUP </button></td></tr>
</table>
</form>
		</div>
      <div style="float:left;width:50%" id="full_clock"></div>
  <div style="clear:both"></div>
</div>

</body>
</html>