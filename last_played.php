<?php
	session_start();
	$uid=$_SESSION['user_id'];
	$uname=$_SESSION['user_name'];
?>
<html><head></head>
<body>
<?php
		include "connect_db.php";
		$db=new connection();
		$db->connect();
		$result=$db->last_played($uid);
		
		if($result){
			if(mysql_num_rows($result)==0)
			{	
				echo '<h3> No games played by you yet ... </h3>';}
			else{
	?>
    <table cellpadding="5">
    <tr> <th> Sr.No.</th><th>  Date  </th> <th> Category </th><th> Score </th>  </tr>
    
	<?php	
			$i=1;
				while($row=mysql_fetch_array($result))
				{
					echo '<tr><td>'.$i++.'</td><td>'.$row['date_time'].'</td><td>';
					if($row['category']== 1)
						echo ' .Net ';
					else if($row['category']== 2)
						echo ' Php ';
					else if($row['category']== 3)
						echo ' Data Mining ';
					echo '</td><td>'.$row['score'].'</td></tr>';
				}
			}
		}
	?>
   </table>
   </body>
   </html>