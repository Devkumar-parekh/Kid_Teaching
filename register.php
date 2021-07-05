<html>
<body>
<?php
$a=$_POST['name'];
$b=$_POST['mail'];
$c=$_POST['pswd'];

$n=0;
$conn=new mysqli("localhost","root","","project");

$sql="SELECT * FROM user";
if($result=$conn->query($sql))
{
	if($result->num_rows>0)
	{
		while($row=$result->fetch_array())
		{
			$d=$row['no'];
		}
	}
}

$e=$d+1;

$sql="INSERT INTO user(no,name,mail,pswd) VALUES('$e','$a','$b','$c')";
$conn->query($sql);

$sql="INSERT INTO record(s_id,progress,homework,num_progress) VALUES('$e',1,1,1)";
$conn->query($sql);

$sql="INSERT INTO result(s_id,progress) VALUES('$e',1)";
$conn->query($sql);

echo "value inserted<br>";
echo "<h3>Your id is $e <h3>";
$conn->close();
?><a href="login.html">To login</a>
</body>

</html>