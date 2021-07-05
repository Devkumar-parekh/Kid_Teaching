<html>
<body>
<?php

$conn=new mysqli("localhost","root","","project");
$sql="select * from feedback where view=0";
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
					
					echo 'No new feedback';
				}
			}

$sql="UPDATE feedback SET view=1";
$conn->query($sql);
$conn->close();
?>
</body>

</html>