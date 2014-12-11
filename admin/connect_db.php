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
		$this->result=mysql_query("SELECT user_id,password,role FROM user_info WHERE username='$user_name';",$this->connection);
		
		if($this->result)
		{
			if(mysql_num_rows($this->result)==1)
			{
				if($this->row=mysql_fetch_array($this->result))
				{
					if($password == $this->row["password"] && $this->row["role"]==1)
					{
						session_start();
					
						$_SESSION['user_id']=$this->row['user_id'];
						$name=explode("@",$user_name);
						$_SESSION['user_name']=$name[0];
						$this->close_connect();
						header("location:admin_home.php");
						$this->close_connect();	
					}
					else
						echo 'Username or password donot match';
				}
			}
			else
				echo "You are not a registered user";
		}
		else
			echo "You are not a registered user";
	}
	function last_played($uid)
	{
		$this->result=mysql_query("SELECT q.*,u.* FROM quiz_info q, user_info u WHERE q.user_id=u.user_id ORDER BY q.date_time;",$this->connection);	
		return $this->result;
	}
	function show_questions($category)
	{	 
		$this->result=mysql_query("SELECT * FROM question_bank WHERE category=$category AND isDeleted=0;",$this->connection);
		return $this->result;
	}
	
	function insert_que($cat)
	{
		$this->result=mysql_query("SELECT max(que_id) FROM question_bank",$this->connection);
		if($this->row=mysql_fetch_array($this->result))
		{
			if(isset($this->row[0]))
			{
				$this->qid=$this->row[0]+1;	
			}
			else
				$this->qid=1;
		}
		echo "INSERT INTO question_bank VALUES (".$this->qid.",'".$_POST['new_que']."','".$_POST['new_opt1']."','".$_POST['new_opt2']."','".$_POST['new_opt3']."','".$_POST['new_opt4']."','".$_POST['ans']."',".$cat.",0);";
		
		$this->result=mysql_query("INSERT INTO question_bank VALUES (".$this->qid.",'".$_POST['new_que']."','".$_POST['new_opt1']."','".$_POST['new_opt2']."','".$_POST['new_opt3']."','".$_POST['new_opt4']."','".$_POST['ans']."',".$cat.",0);",$this->connection);
		
		if($this->result)
		echo "Question added successfully";
		else
			die(mysql_error());
	}
	function update_que()
	{		
		if(isset($_POST['answer']))
		{
			$str="UPDATE question_bank SET question='".$_POST['question']."',option1='".$_POST['option1']."',option2='".$_POST['option2']."',option3='".$_POST['option3']."',option4='".$_POST['option4']."',answer='".$_POST['answer']."' WHERE que_id=".$_POST["queid"].";";
		}
		else
		{
			$str="UPDATE question_bank SET question='".$_POST['question']."',option1='".$_POST['option1']."',option2='".$_POST['option2']."',option3='".$_POST['option3']."',option4='".$_POST['option4']."' WHERE que_id=".$_POST["queid"].";";
		}
		//echo $str.'<br>';
		$this->result=mysql_query($str,$this->connection);
		
		if($this->result)
		echo "Question added successfully";
		else
			die(mysql_error());
	}
	function delete_que($que_id)
	{
		$this->result=mysql_query("UPDATE question_bank SET isDeleted=1 WHERE que_id=$que_id",$this->connection);
		
		if($this->result)
		echo "Question added successfully";
		else
			die(mysql_error());
	}
	function close_connect()
	{
		mysql_close($this->connection);
	}
}
?>
