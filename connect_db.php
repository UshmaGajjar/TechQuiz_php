<?php

class connection
{
	var $host='localhost';
	var $username='root';
	var $password='';
	var $database='db_techquiz';
	var $connection;
	var $rs;
	var $result;	
	var $uid;
	var $row;
	var $qid;
	//$connection=mysql_connect("localhost","root","");
	//$rs=mysql_select_db("techquiz",$connection);
	
	function connect()
	{
		$connection=mysql_connect($this->host,$this->username,$this->password);
		if(!$connection)
			die("Server connection failed".mysql_error());
		else
		{	
			$this->connection=$connection;
			$this->rs=mysql_select_db($this->database,$this->connection);
		}
		if(!$this->rs)
			die("Databse election failed".mysql_error());
			
		return $this->connection;
	}
	
	function check_login($user_name,$password)
	{
		$this->result=mysql_query("SELECT user_id,password FROM user_info WHERE username='$user_name';",$this->connection);
		
		if($this->result)
		{
			if(mysql_num_rows($this->result)==1)
			{
				if($this->row=mysql_fetch_array($this->result))
				{
					if($this->row['password'] == $password)
					{
						session_start();
					
						$_SESSION['user_id']=$this->row['user_id'];
						$name=explode("@",$user_name);
						$_SESSION['user_name']=$name[0];
						$this->close_connect();
						header("location:user_home.php");
					}
					else
						echo 'Username or password donot match';
					$this->close_connect();	
				}
			}
			else
				echo 'Please signup to login.';
		}
		else
			echo 'Login failed';
	}
	
	function add_user($email_id,$pass,$fname,$lname,$occupation,$gender,$bdate)
	{
		$this->result=mysql_query("SELECT max(user_id) FROM user_info",$this->connection);
		if($this->row=mysql_fetch_array($this->result))
		{
			if(isset($this->row[0]))
			{
				$this->uid=$this->row[0]+1;	
			}
			else
				$this->uid=1;
		}
			
		$this->result=mysql_query("INSERT INTO user_info (user_id, username,password,first_name,last_name,occupation,gender,birth_date,isActive,role) VALUES ($this->uid,'$email_id','$pass','$fname','$lname','$occupation','$gender','$bdate',1,2);",$this->connection);	
		if($this->result)
		{
			if(mysql_affected_rows($this->connection)==1)
			{
				session_start();
				
				$_SESSION['user_id']=$this->uid;
				$uname=explode("@",$email_id); 
				$_SESSION['user_name']=$uname[0];
		
				header('location:user_home.php');	
			}
		}
		else
			echo 'Registeration failed';
	}
	
	function last_played($uid)
	{
		$this->result=mysql_query("SELECT * FROM quiz_info WHERE user_id=".$uid." ORDER BY date_time;",$this->connection);	
		return $this->result;
	}
	function show_questions($category)
	{	 
		$this->result=mysql_query("SELECT * FROM question_bank WHERE category=$category;",$this->connection);
		return $this->result;
	}
	
	function quiz_entry($user_id,$date_time,$cat,$score)
	{
		$this->result=mysql_query("SELECT max(quiz_id) FROM quiz_info",$this->connection);
		if($this->row=mysql_fetch_array($this->result))
		{
			if(isset($this->row[0]))
			{
				$this->qid=$this->row[0]+1;	
			}
			else
				$this->qid=1;
		}
		//echo "INSERT INTO quiz_info (quiz_id,user_id,date_time,category,score) VALUES ($this->qid,$user_id,'$date_time',$cat,'$score')";
		$this->result=mysql_query("INSERT INTO quiz_info (quiz_id,user_id,date_time,category,score) VALUES ($this->qid,$user_id,'$date_time',$cat,'$score');",$this->connection);
		return $this->result;
	}
	function show_result($que)
	{		
		$this->result=mysql_query("SELECT * FROM question_bank WHERE que_id IN (". $que.");",$this->connection);
		return $this->result;
	}
	
	function close_connect()
	{
		mysql_close($this->connection);
	}
}
?>
