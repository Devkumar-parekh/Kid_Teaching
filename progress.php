<html>

<head>
    <title>
        progress
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

      progress {
    width: 50%;
    height: 20px;
    color: #3fb6b2;
    background: #efefef;
}
    </style>
  </head>
  
  <body style="background-color: silver;">
  
    <div class="gallery">
      <a>
        <img src="progress_img.gif" alt="Cinque Terre" width="600" height="400">
      </a>
    </div>
    <br><br><br><br><br>
	<h1 align='center'>PROGRESS</h1>
	
	<?php

		$login_id=$_POST['login_id'];
		
		$conn=new mysqli("localhost","root","","project");
		$sql="SELECT * FROM record where s_id=$login_id";
		$result=$conn->query($sql);
		$row=$result->fetch_array();
		$p1=$row['progress'];
		$p2=$row['num_progress'];
		$sql="SELECT * FROM result where s_id=$login_id";
		$result=$conn->query($sql);
		$row=$result->fetch_array();
		$p3=$row['progress'];
		
		echo 'Alphabet: <progress id="alphabet" min="0" max="26" value=';echo $p1; echo '></progress><br><br>
	Numbers:  <progress id="numbers" min="0" max="9" value=';echo $p2; echo '>
    </progress><br><br>Quiz:<progress id="numbers" min="0" max="9" value=';echo $p3; echo '>
    </progress><br><br>';
	?>
	
	
    
  
</body>

</html>