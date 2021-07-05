<html>
<body>
<center><h1>Feedbacks of users</h1></center>
<?php

$conn=new mysqli("localhost","root","","project");
$sql="select * from feedback";
			if($result=$conn->query($sql))
			{
				if($result->num_rows>0)
				{
					echo '<center>';
					echo '<table border="1">';
					while($row=$result->fetch_array())
					{	echo '<tr><td>';
						$feedback=$row['feedback'];
						echo $feedback;
						echo '</td></tr>';
					}
					echo '</table>';
					echo '</center>';
					
				}
				else{
					
					echo 'No feedback';
				}
			}

$conn->close();
?>
</body>

</html>