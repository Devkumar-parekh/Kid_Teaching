<html>
<body>
<?php

$conn=new mysqli("localhost","root","","project");
$sql="select * from record";
			if($result=$conn->query($sql))
			{
				if($result->num_rows>0)
				{
					echo '<center>';
					while($row=$result->fetch_array())
					{
						$s_id=$row['s_id'];
						$p1=$row['progress'];
						$p2=$row['num_progress'];
						echo 'No:';
						echo $s_id;
						echo '<br>';
						echo 'Alphabet: <progress id="alphabet" min="0" max="26" value=';echo $p1; echo '></progress><br><br>
	Numbers:  <progress id="numbers" min="0" max="9" value=';echo $p2; echo '>
    </progress><br><br>';
						
						
						
						echo '<br>';
					}
					echo '</center>';
					
				}
			}



$conn->close();
?>
</body>

</html>