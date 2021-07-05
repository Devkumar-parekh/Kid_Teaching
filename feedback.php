<html>
<body>
<?php

$b=$_POST['feedback'];

$conn=new mysqli("localhost","root","","project");

$sql="INSERT INTO feedback(feedback,view) VALUES('$b',0)";
$conn->query($sql);
echo "Thank you for Feed back.<br>We will get your idea and try to improve ourselves";

$conn->close();
?>

</body>

</html>