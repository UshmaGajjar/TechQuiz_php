<?php
	session_start();
	
	if(isset($_SESSION['user_id']) && isset($_SESSION['user_name']))
	{
		$uid=$_SESSION['user_id'];
		$uname=$_SESSION['user_name'];
	}
	else
	{
		header("location:login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TexhQuiz | php</title>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<script src="../js/validations.js"></script>
<script src="../js/jquery.min.js"></script>
<script>	
	$(document).ready(function(){
		$("#add_new").hide();
	});
</script>
<style>
	#overlay,#submit_form,#start_quiz,#loading {
     background:rgba(0,0,0,0.5);
	 visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;
}
#overlay div ,#submit_form div,#start_quiz div,#loading div{
     width:300px;
	 height:auto;
     margin: 100px auto;
     background-color: #fff;
     border:1px solid #000;
     padding:15px;
     text-align:center;
}
</style>
</head>
<body id="page2" >
<div id="que_header">
	<div style="float:left;width:30%">TQ
    	<?php
		/*if($_GET['category'] == 2 || $_SESSION["cat"]==2)
    	echo '<img src="../images/php.png"/>';
		else if($_GET['category'] == 1 || $_SESSION["cat"]==1)
		echo '<h2> ASP.NET </h2>';
		else if($_GET['category'] == 3 || $_SESSION["cat"]==3)
		echo '<h2> DATA MINING </h2>';*/
	?>	
    </div>
    <div style="float:left;width:40%">
    	quiz
    </div>
 
    <div style="float:left;width:30%;text-align:right"> <img src="../images/TechQuiz.png"/><br />
    <a href="logout.php">logout</a></div>
    <div style="clear:both"></div>
</div>
<div class="header_wrapper">
<?php
	session_start();
	if(isset($_GET['category'])){
		
		$_SESSION["cat"]=$_GET["category"];
		$cat=$_GET["category"];
	}
	else
	{
		$cat=$_SESSION["cat"];
	}
	if($cat==2)
    	echo '<img src="../images/php.png"/>';
		else if($cat ==1)
		echo '<h2> ASP.NET </h2>';
		else if($cat==3)
		echo '<h2> DATA MINING </h2>';
	include 'connect_db.php';
	$obj=new connection();
	$obj->connect();
	$result=$obj->show_questions($cat);
	
	if(result)
	{
		$total=mysql_num_rows($result);
		if($total > 0)
		{
			?>
            <br />
            <div align="right"><a href="javascipt:void 0;" onclick="$('#add_new').toggle('slow')" class="button" style="text-decoration:none;padding:8px"><b> + </b> ADD NEW</a></div>
            
            
            
            <div id="add_new">
            <h3>Adding new question ... </h3>
            <form id="form1" name="form1" method="post"  action="action.php">
            <table>
            <tr><td>Question : </td><td><textarea name="new_que" id="new_que" cols="80" rows="3"></textarea></td></tr>
              <td>Option A : </td><td><input type="radio" name="ans" id="ans" value="A"/>
              						  <input name="new_opt1" id="new_opt1" type="text" size="97" /></td></tr>
            <tr>
              <td>Option B : </td><td><input type="radio"  name="ans" id="ans" value="B"/>
              						  <input name="new_opt2" id="new_opt2" type="text" size="97" /></td></tr>
            <tr>
              <td>Option C : </td><td><input type="radio" name="ans" id="ans" value="C"/>
              						  <input name="new_opt3" id="new_opt3" type="text" size="97" /></td></tr>
            <tr>
              <td>Option D : </td><td><input type="radio" name="ans" id="ans" value="D"/>
              						  <input name="new_opt4" id="new_opt4" type="text" size="97" /></td></tr>
    
            <tr><td><button type="submit" name="submit" value="add_new_que"> ADD </button></td>
            	<td><button type="reset" name="submit" value="reset_new_que"> RESET </button></td></tr>
            </table>
            </form>
            </div>
            <br />

		<?php	
			echo "<h3>Total Questions : ".$total."</h3>";
			for($i=0;$i<$total;$i++)
			{
				mysql_data_seek($result,$i);
				if($row=mysql_fetch_array($result))
				{
					echo $row['que_id']. '. '.$row['question'].'<br>
						  A. '.htmlspecialchars($row['option1']).'<br> 	 
						  B. '.htmlspecialchars($row['option2']).'<br>	 
						  C. '.htmlspecialchars($row['option3']).'<br>	 
						  D. '.htmlspecialchars($row['option4']).'<br><br>
						  Answer : '.$row['answer'].'<br>';
						
				echo '<form action="action.php" method="post">';  
				echo '<div id="edit_'.$row['que_id'].'"><br> Editing question ...<br>';
				echo $row['que_id']. '. <textarea name="question" cols="79">'.$row['question'].'</textarea><br>
						 <input type="radio" name="answer" value="A"> A. 
						 <input type="text" name="option1" value="'.htmlspecialchars($row['option1']).'" size="97"><br> 	 
						 <input type="radio" name="answer" value="B"> B.
						 <input type="text" name="option2" value="'.htmlspecialchars($row['option2']).'" size="97"><br>
						 <input type="radio" name="answer" value="C"> C. 
						 <input type="text" name="option3" value="'.htmlspecialchars($row['option3']).'" size="97"><br>	 
						 <input type="radio" name="answer" value="D"> D. 
						 <input type="text" name="option4" value="'.htmlspecialchars($row['option4']).'" size="97"><br>
						 <input type="hidden" name="queid" value="'.$row['que_id'].'">';
						 
				echo '<div align="right"><button type="submit" name="submit" value="save_que"> SAVE </button> &nbsp; &nbsp; <a href="javascript: void 0;" onclick="$(\'#edit_'.$row['que_id'].'\').toggle(\'slow\');" class="button"> CANCEL </a></div>';
				
				echo '</div></form>';	
					 
					echo '<div align="right"><a href="javascript: void 0;" onclick="$(\'#edit_'.$row['que_id'].'\').toggle(\'slow\');"><img src="../images/pencil.png" title="Edit question"></a> &nbsp; 
						<a href="delete_que.php?que_id='.$row['que_id'].'"><img src="../images/delete.png" title="Delete question"></a></div>';
					}
				}	
            }
			else
				echo 'There are no questions to display';
		}
		else
			echo 'question can\'t be displayed';
 ?>
  </div>
  <?php
  	$result=$obj->show_questions($cat);
	while($row=mysql_fetch_array($result)):
  ?>
<script>	
	$(document).ready(function(){
		$('<?php echo "#edit_".$row[0] ;?>').hide();
	});
</script>
<?php  endwhile;?>
</body>
</html>