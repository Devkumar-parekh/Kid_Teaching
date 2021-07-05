<html>
<head>

	<style>
    

    div.gallery img {
      width: 15%;
      height: auto;
    }
	form{
		border:1px;
		border-radius:10%;
		margin:20px;
		padding:20px;
		
	}
	id{
		border:1px;
		border-radius:50%;
		background-color:white;
	}
  </style>

</head>
<body>
<?php
	$a=$_POST['no'];
	$b=$_POST['pswd'];
	$n=0;
	$teach_pswd='0';
	$conn=new mysqli("localhost","root","","project");
	$sql="select * from teacher where no=$a";
	$result=$conn->query($sql);
	$row=$result->fetch_array();
	
	if($result->num_rows>0){
		$teach_pswd=$row['pswd'];
	}
	$conn=new mysqli("localhost","root","","project");
	$sql="select * from user where no=$a";
	$result=$conn->query($sql);
	$row=$result->fetch_array();
	if($result->num_rows>0){
		
		$d=$row['no'];
		$name=$row['name'];
		$p=$row['pswd'];
	}

	
	if($a==1 && $b=='admin')//for admin login
	{
		
		echo '<center>';
		echo '<h1>Admin use</h1>';
		echo '<button><a href="insert_teacher.html">Insert Teacher</a></button><br><br>';
		echo '<button><a href="fdbc_v_admin.php">View feedback</a></button><br><br>';
		echo '</center>';
		
	}
	else if($b==$teach_pswd){//this are the things what teacher can do
		echo '<center>';
		echo '<h1>Teacher use</h1>';
		echo '<button><a href="hw.html">Add Homework</a></button><br><br>';
		echo '<button><a href="quiz_insert.html">Add Quiz Question</a></button><br><br>';
		echo '<button><a href="feedback_view.php">View feedback</a></button><br><br>';
		echo '<button><a href="progress_view.php">View Progress of all students</a></button>';
		echo '</center>';
	}
	else if ($d==$a && $b==$p){//this is what student can do
		echo '<center>
			Login successfull
			<form action="daily.php" method="post" style="background-color: lightcyan;">';
			echo '<input align="right" name="login_id" value=';echo $d;echo ' id="id"/>';
			
			echo '<h3 align="right" id="name">';
			echo $name; 
			echo '</h3>';
			echo '
				<br><br><br>
				<input type="submit" value="Daily-tasks"/>';
			echo '<div class="gallery">
				<a>
				  <img src="daily_tasks_img.gif" alt="Cinque Terre" width="600" height="400">
				</a>
				</div>';	
		echo '</form>
			<form action="quiz.php" method="post" style="background-color: paleturquoise;">';
			echo '<input align="right" name="login_id" value=';echo $d;echo ' id="id"/>';
			
			
			echo '	<h3 align="right" style="color:paleturquoise">';echo $name; echo '</h3>';
			echo '<input type="submit" value="Quiz"/>';
			echo '<div class="gallery">
			<a>
			  <img src="quiz_img.gif" alt="QUIZ" width="600" height="400">
			</a>
		  </div>';
		echo '</form> 

			
			<form action="progress.php" method="post" style="background-color: silver;">';
			echo '<input align="right" name="login_id" value=';echo $d;echo ' id="id"/>';
			
			
			echo '	
				<h3 align="right" style="color:silver">';echo $name; echo '</h3>';
			echo '
				<input type="submit" value="Progress"/>';
			
			echo '<div class="gallery">
			  <a>
				<img src="progress_img.gif" alt="Cinque Terre" width="600" height="400">
			  </a>
			</div>';
		
		echo '</form><br><br> 
			
		</center>';
	}
	else{//if wrong password or index
		echo "Wrong pswd or index";
		echo '
		<html>

	<head>
	  <title>
		Login
	  </title>
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

	<body style="background-color: lightgrey;">


	  <div class="gallery">
		<a>
		  <img src="login_img.gif"  width="600" height="400">
		</a>
	  </div>

	  <form action="login.php" method="post">
	 
	 

		<center>
		  <img src="login-fill.svg" alt="" width="72" height="57"><br><br>
		  <h1>Sign Up</h1><br><br>


		  Number :
		  <input type="digit" name="no" placeholder="enter your number"/><br><br>

		  Password :
		  <input type="password" name="pswd" id="pswd" placeholder="Password"/><br><br>

		  <button type="submit" class="btn btn-primary">Login</button>
		  <br>
		  if new user ,then try <a href="register.html">register<a/>
		  
		  <p>&copy; 2021-2022</p>
		</center>
	  </form>
	</body>

	</html>';
		
	}

	$conn->close();
?>
</body>

</html>

