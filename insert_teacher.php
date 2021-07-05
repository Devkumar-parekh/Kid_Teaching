<html>
<body>
<?php
$name=$_POST['name'];
$mail=$_POST['mail'];
$mno=$_POST['mno'];
$pswd=$_POST['pswd'];

$n=0;
$conn=new mysqli("localhost","root","","project");

$sql="SELECT * FROM teacher";
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


$sql="INSERT INTO teacher(no,name,mail,mno,pswd) VALUES('$e','$name','$mail','$mno','$pswd')";
$conn->query($sql);
echo "value inserted";
echo "<h3>Your id is $e <h3>";
$conn->close();
?><a href="insert_teacher.html">to insert</a>
</body>

</html>