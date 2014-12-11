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
				echo '<h3> No games played by any user yet ... </h3>';}
			else{
	?>
    <table width="586" cellpadding="5">
    <tr bgcolor="#CCCCCC"> <th width="56"> Sr.No.</th><th width="170">  Username  </th><th width="146">  Date  </th> <th width="85"> Category </th><th width="65"> Score </th>  </tr>
    
	<?php	
			$i=1;
				while($row=mysql_fetch_array($result))
				{
					echo '<tr><td>'.$i++.'</td><td>'.$row['username'].'</td><td>'.$row['date_time'].'</td><td>';
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