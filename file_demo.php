<?php

	if(isset($_POST["write_file"]))
	{
		if($_POST["write_file"] == "pdf")	
		{			
			session_start();
			$_SESSION["res"]=$_POST["result"];
			header("location:pdf_file.php");
		}
		else if($_POST["write_file"] == "doc")	
		{
			echo "Your quiz result .doc( MS Word) file download has started ....";
		
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment;Filename=quiz_result.doc");

			echo "<html>";
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
			echo "<body>";
			echo "      QUIZ RESULT <br>";
			while(list($index,$val)= each($_POST['result']))
			{
				//$res.=$val;
				echo $val .'<br>';
			}
			echo "</body>";
			echo "</html>";

		}
		else if($_POST["write_file"] == "txt")	
		{
			//echo "Your quiz result .txt( Notepad ) file download has started ....<br>";
		
			header('Content-disposition: attachment; filename=quiz_result.txt');
			header('Content-type: text/plain');

			echo "      QUIZ RESULT\r\n \r\n";
			
			while(list($index,$val)= each($_POST['result']))
			{
				//$res.=$val;
				echo $val ."\r\n";
			}
		}
	}
?>
