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
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/layout.css" type="text/css" rel="stylesheet" />
<script src="js/validations.js"></script>
<script src="js/jquery.min.js"></script>
<script>	
	function time_up(code2show)
	{
		var inputs=new Array();
		var total=0;
	    inputs = document['form1'].getElementsByTagName('input');
		for(var i=0;i<inputs.length;i++)
		{
			if(inputs[i].type == 'radio')
			{
				if(inputs[i].checked == true)
					total++;
			}
		}
		if(code2show == 'overlay')
		{
			$('#msg').html("Sorry! Your time's up!");
			$('#stat').html('Total questions answered : ' +total+' / 10');
		}
		else if(code2show == 'submit_form')
		{
			$('#message').html("You still have time.<br>Do you really want to submit your quiz?");
			$('#statistics').html('Total questions answered : ' +total+' / 10');
		}
		overlay_on(code2show);
	}
	function start_quiz(ans)
	{
		if(ans== true)
		{
			overlay('start_quiz');
			m=0;
			s=59;
			setTimeout("timer()",1000);
		}
		else
		{
			//window.location.replace("user_home.php");	
			window.location="user_home.php";	
		}
	}
	function window_load() 
	{
		overlay('start_quiz');		
	}
	function timer()
	{
		$('#time').html(m + ' : '+ s);
		if(s>0){
			s=s-1;
			setTimeout("timer()",1000);
		}
		else if(s==0)
		{
			if(s==0 && m==0)
			{		
				setTimeout("time_up('overlay')",1000);
			}
			else
			{
				s=59;m=m-1;
				setTimeout("timer()",1000);
			}
		}
	}
	function overlay(code2show) 
	{
		el = document.getElementById(code2show);
		el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	}
	function overlay_on(code2show)
	{
		el = document.getElementById(code2show);
		el.style.visibility ="visible";
	}
	function loading(code2show)
	{
		overlay(code2show);
		setTimeout("overlay_on('loading')",1);
		setTimeout("",50000);
		setTimeout("form1.submit()",1);
	}
</script>
<style>
	#overlay,#submit_form,#start_quiz,#loading {
     background:rgba(0,0,0,0.9);
	 visibility: hidden;
    /* position: absolute;*/
     left: 0px;
    /* top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;*/
	 
	 width: 100%;
    position: fixed;
    bottom: 0px;
   /*left: 50%;*/
    margin-left:0px;
}
#overlay div ,#submit_form div,#start_quiz div,#loading div{
     width:300px;
	 height:auto;
     margin: 100px auto;
     background-color: #fff;
     border:1px solid #000;
     padding:20px;
     text-align:center;
}
</style>
</head>
<body id="page2" onload="window_load()">
<div id="que_header">
	<div style="float:left;width:30%">
    <?php
		if($_GET['category'] == 2)
    	echo '<img src="images/php.png"/>';
		else if($_GET['category'] == 1)
		echo '<h2> ASP.NET </h2>';
		else if($_GET['category'] == 3)
		echo '<h2> DATA MINING </h2>';
	?>	
	</div>
    <div style="float:left;width:40%"> Quiz </div>
    <div style="float:left;width:30%;text-align:right"> <img src="images/TechQuiz.png"/> <br /><b> time left - </b> <span id="time">  10 : 00 </span></div>
    <div style="clear:both"></div>
</div>
<div class="header_wrapper">
<?php
	if(isset($_GET['category'])){
	include 'connect_db.php';
	$obj=new connection();
	$obj->connect();
	$result=$obj->show_questions($_GET['category']);
	
	if($result)
	{
		$total=mysql_num_rows($result);
		if($total > 0)
		{
			$que=array();	
			$num=range(0,$total-1);
			shuffle($num);
			$que=array_slice($num,0,10);
			//foreach($que as $a){ echo $a.'<br>';}
			?>
            <form id="form1" name="form1" method="post" action="action.php">
		<?php	
			for($i=0;$i<10;$i++)
			{
				mysql_data_seek($result,$que[$i]);
				if($row=mysql_fetch_array($result))
				{
					echo ($i+1). '. '.$row['question'].'<br>
						 <input type="radio" name="question'.$row['que_id'].'" value="A"> A. '.htmlspecialchars($row['option1']).'<br> 	 
						 <input type="radio" name="question'.$row['que_id'].'" value="B"> B. '.htmlspecialchars($row['option2']).'<br>	 
						 <input type="radio" name="question'.$row['que_id'].'" value="C"> C. '.htmlspecialchars($row['option3']).'<br>	 
						 <input type="radio" name="question'.$row['que_id'].'" value="D"> D. '.htmlspecialchars($row['option4']).'<br><br>
						 <input type="hidden" name="que[]" value="'.$row['que_id'].'">';
					}
				}	
				echo '<input type="hidden" name="cat" value="'.$_GET['category'].'">
				<button type="button" name="submit" value="submit_quiz" onclick="time_up(\'submit_form\')"> SUBMIT </button>';
				?>
                <div id="overlay">
     				<div>
          				<p id="msg"></p>
                        <p id="stat"></p>
        			    <button type="submit" name="submit" value="submit_quiz" onclick="loading('overlay')"> OK </button>
     				</div>
				</div>
                <div id="submit_form">
                	<div>
                    	<p id="message"></p>
                        <p id="statistics"></p>
                    	<button type="submit" name="submit" value="submit_quiz" onclick="loading('submit_form')"> SUBMIT </button>					
                        <button type="button" name="submit" value="cancel_quiz" onclick="overlay('submit_form')"> CANCEL </button>
                    </div>
                </div>
				</form>
			<?php
            }
			else
				echo 'There are no questions to display';
		}
		else
			echo 'question can\'t be displayed';
?>
	<div id="start_quiz">
     				<div>
          				<p id="msg">Do you really want to start the quiz?</p>
        			    <button type="button" name="ok" onclick="start_quiz(true)"> YES </button>
                        <button type="button" name="cancel" onclick="start_quiz(false)"> NO </button>
     				</div>
	</div>
    <div id="loading">
     				<div>
                    	<img src="images/animated.gif" alt="loading..."/>
          				<p id="process">Please wait...<br> Your result is being prepared</p>
     				</div>
	</div>
   <?php } ?>
  </div>
</body>
</html>