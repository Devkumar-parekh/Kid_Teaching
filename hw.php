<html>
<body>
<?php

$b=$_POST['alphabet'];
$c=$_POST['speech'];

$n=0;
$conn=new mysqli("localhost","root","","project");
$sql="select * from hw";
if($result=$conn->query($sql))
{
	if($result->num_rows>0)
	{
		while($row=$result->fetch_array())
		{
			$d=$row['no']+1;
		}
	}
}

$sql="INSERT INTO hw(no,alphabet,speech) VALUES('$d','$b','$c')";
$conn->query($sql);
echo "value inserted";

$conn->close();
?>
<a href="hw.html">Enter next</a>
</body>

</html>