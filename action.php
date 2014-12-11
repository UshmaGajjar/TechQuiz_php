<?php
	include "connect_db.php";
	
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
	
	if(isset($_POST['submit']))
	{
		$db_con=new connection;
		$con=$db_con->connect();
		
		if($_POST['submit']== 'login')
		{
			$db_con->check_login($_POST['uname'],sha1($_POST['password']));
		}
		
		if($_POST['submit']== 'signup')
		{
			$db_con->add_user($_POST['email'],sha1($_POST['passwd1']),ucwords($_POST['fname']), ucwords($_POST['lname']),$_POST['occupation'],$_POST['gender'],$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day']);
		}
		
		if($_POST['submit'] == 'submit_quiz')
		{
			while(list($index,$val)= each($_POST['que']))
			{
				$ar[]= $_POST['que'][$index];
			}
			$que=implode(',',$ar);
			
			$result=$db_con->show_result($que);	
		
			if($result)
			{
			  $score=0;	
			  for($i=0;$i<10;$i++)
			  {
			  	if(isset($_POST['question'.$ar[$i]]))
					$user_ans[$ar[$i]]=$_POST['question'.$ar[$i]];
				else
					$user_ans[$ar[$i]]="no answer";
			  }
			  $score=0;
			   $j=1;
			  echo '<html><head>
			  		<link href="css/style.css" type="text/css" rel="stylesheet" />
					<script src="js/validations.js"></script>
					<script src="js/jquery.min.js"></script>
					</head>
					<body>';
					
?>
			<!--<div id="que_header">
	<div style="float:left;width:30%">-->
    <?php
		/*if($_POST['cat'] == 2)
    	echo '<img src="images/php.png"/>';
		else if($_POST['cat'] == 1)
		echo '<h2> ASP.NET </h2>';
		else if($_POST['cat'] == 3)
		echo '<h2> DATA MINING </h2>';*/
	?>	
	<!--</div>
    <div style="float:left;width:40%"> Quiz </div>
    <div style="float:left;width:30%;text-align:right"> <img src="images/TechQuiz.png"/> </div>
    <div style="clear:both"></div>
</div>-->

<div style="padding:50px;margin:auto;width:70%;text-align:center">
<h2> Quiz Result</h2>
<?php
			  echo '<form method="post" action="file_demo.php">';
				 
			  while(list($index,$val)=each($user_ans))
			  {   

				 for($i=0;$i<10;$i++)
				 {
					 mysql_data_seek($result,$i);
					 $row=mysql_fetch_array($result);
					 //echo $index .' - '.$val .' / ' . $row[0] . ' - '.$row[1] .'<br>';
					 //if($index == $row['que_id'] && $val == $row['answer'])

					 if($index == $row['que_id'])
					 {
						 $output[]= "Q ". $j." :  ".$row['question']."<br> A. ".$row['option1']."<br> B. ".$row['option2']."<br> C. ".$row['option3']."<br> D. ".$row['option4']."<br> Your answer : ".$val ." <br> Correct answer : ".$row['answer'] ."<br><br>"; 
						 $wr[]=" Q ". $j." :  ".$row['question'];
						 $wr[]=" A. ".htmlspecialchars($row['option1']);
						 $wr[]=" B. ".htmlspecialchars($row['option2']);
						 $wr[]=" C. ".htmlspecialchars($row['option3']);
						 $wr[]=" D. ".htmlspecialchars($row['option4']);
						 $wr[]=" Your answer : ".$val;
						 $wr[]=" Correct answer : ".$row['answer'];
					 	 if($val == $row['answer'])$score++;
					 }		
				 }
				  $j++;
			  }
			  $result=$db_con->quiz_entry($_SESSION['user_id'],date('y-m-d h:i:s'),$_POST['cat'],$score.' / 10');		
			  echo "<h2>score :". $score ." / 10 </h2>
			  
			  		<h3> Total no of Questions : 10</h3>
					<h3> Correct answers : ".($score)."</h3>
					<h3> Incorrect answers : ".(10-$score)."</h3><br> ";
			  $sc=  "score :". $score ." / 10";
			  echo '<input type="hidden" name="result[]" value="'.$sc.'">';
			 /* foreach($output as $out)
				{	
					echo $out;
			    }*/
				foreach($wr as $w){
					echo '<input type="hidden" name="result[]" value="'.$w.'">';
				}
?>               	
				<h4>Download full quiz result from here ... </h4>
                    	<button type="submit" name="write_file" value="pdf"> Pdf </button>
                        <button type="submit" name="write_file" value="doc"> Doc </button>
                        <button type="submit" name="write_file" value="txt"> Txt </button>
                    </form>
                     <a href="logout.php">logout</a>
     					</div>               
                  
                </body>
                </html>
<?php
			}
		}
	}
?>