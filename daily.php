<html>
<head>
	<style>
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: right;
      width: 600px;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 100%;
      height: auto;
    }
  </style>
  
  
</head>
<body>

	<?php


	$login_id=$_POST['login_id'];
	echo $login_id;
	echo '<center>';
	echo '
		<form action="daily_tasks.php" method="post">
			<input align="right" name="login_id" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="ABCD"/>';
		echo '</form>
	
	';
	
	
	echo '
		<form action="numbers.php" method="post">
			<input align="right" name="login_id" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="123"/>';
		echo '</form>
	
	';
	
	echo '
		<form action="homework.php" method="post">
			<input align="right" name="login_id" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="Homewrok"/>';
		echo '</form>
	
	';
	
	
	
	
	
	echo '</center>';
	?>
	<div class="gallery">
		<a>
		  <img src="daily_tasks_img.gif"  width="600" height="400">
		</a>
	</div>
	
</body>
</html>