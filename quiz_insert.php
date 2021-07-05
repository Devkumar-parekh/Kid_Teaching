<html>
<body>
<?php
$que=$_POST['que'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];
$op4=$_POST['op4'];
$ans=$_POST['ans'];



$n=0;
$conn=new mysqli("localhost","root","","project");

$last=0;
$sql="select * from quiz";
			if($result=$conn->query($sql))
			{
				if($result->num_rows>0)
				{
					while($row=$result->fetch_array())
					{
						$last=$row['no'];
					}
					
				}
			}


$last=$last+1;


$sql="INSERT INTO quiz(no,que,op1,op2,op3,op4,ans) VALUES('$last','$que','$op1','$op2','$op3','$op4','$ans')";
$conn->query($sql);
echo "value inserted";
$conn->close();
?><a href="quiz_insert.html">to insert</a>
</body>

</html>