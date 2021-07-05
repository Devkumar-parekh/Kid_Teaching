<html>

<head>
  <title>
    quiz
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
	
	textarea,input{
		color:paleturquoise;
		background-color: paleturquoise;
		border-color:paleturquoise;
	}
	
	button{
		
		width:10%;
		height:20%;
		font-size:25px;
		
		
		
	}
	
	div1{
		
		display:inline-block;
		
	}
	
  </style>
  
  <script>
function readOutLoud() {
var speech = new SpeechSynthesisUtterance();
message=document.getElementById('note-textarea').value;

speech.text = message;
speech.volume = 1;
speech.rate = 0.7;
speech.pitch = 1;

window.speechSynthesis.speak(speech);
}
function result(r){
	var speech = new SpeechSynthesisUtterance();
			speech.text =r;
			speech.volume = 1;
			speech.rate = 0.7;
			speech.pitch = 1;
			window.speechSynthesis.speak(speech);
}
function check(p){
		
		
		var ans=document.getElementById(p).value;
		var answer=document.getElementById('ans').value;
		
		if(ans==answer){
			result('Right Answer');
			
		}
		else{
			result('Sorry........You are wrong');
						
		}
	}


</script>

  
</head>

<body style="background-color: paleturquoise;" onload="result('Please click on Question button to know the question')">

  <div class="gallery">
    <a>
      <img src="quiz_img.gif" alt="QUIZ" width="600" height="400">
    </a>
  </div>
  <?php
  
	$login_id=$_POST['login_id'];
	echo "<center>";
	$conn=new mysqli("localhost","root","","project");
	$sql="SELECT * FROM result where s_id=$login_id";
			$result=$conn->query($sql);
			$row=$result->fetch_array();
			$progress=$row['progress'];
			$a=$row['progress']+1;
			$sql="UPDATE result SET progress='$a'";
			$conn->query($sql);
			/*if($a>9){
				$sql="UPDATE result SET progress=1";
				$conn->query($sql);
			}*/
			
			
			$sql="select * from quiz";
			if($result=$conn->query($sql))
			{
				if($result->num_rows>0)
				{
					while($row=$result->fetch_array())
					{
						$last=$row['no'];
					}
					if($progress==$last-1){
							echo "<h2>Well Done You Done Your Quiz Complete</h2>";
							$sql="UPDATE result SET progress=1";
							$conn->query($sql);
							
						}
				}
			}
			
			
			
	$sql="SELECT * FROM quiz where no=$a";
	$result=$conn->query($sql);
	$row=$result->fetch_array();
	
	$q=$row['que'];
	$a=$row['op1'];
	$b=$row['op2'];
	$c=$row['op3'];
	$d=$row['op4'];
	$ans=$row['ans'];
	
	echo "<button onclick='readOutLoud()'>Question</button>";
	echo "<input id='note-textarea' value='$q' style='color:paleturquoise'/>";
	
	echo "<br>";
	echo "<div class='div1'>";
	echo "<button onclick='check(`a`)'>$a</button><br>";
	echo "<input id='a' value='$a'  style='color:paleturquoise'>";
	echo "</input><br>";
	echo "</div>";
	echo "<div class='div1'>";
	echo "<button  onclick='check(`b`)'>$b</button><br>";
	echo "<input id='b' value='$b'  style='color:paleturquoise'>";	
	echo "</input><br>";
	echo "</div>";
	
	echo "<div class='div2'>";
	echo "<button  onclick='check(`c`)'>$c</button><br>";
	echo "<input id='c' value='$c'  style='color:paleturquoise'>";	
	echo "</input><br>";
	echo "</div>";
	echo "<div class='div2'>";	
	echo "<button  onclick='check(`d`)'>$d</button><br>";
	echo "<input id='d' value='$d'  style='color:paleturquoise'>";	
	echo "</input >";
	echo "</div><br>";
	echo "<input id='ans' value='$ans'  style='color:paleturquoise'>";
	
	echo "</input><br>";
	
	
	


	echo '
		<form action="quiz.php" method="post">
			<input align="right" name="login_id"  style="background-color: lightcyan;color:lightcyan"  value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="Next"  style="background-color: lightcyan;color:black" />';
		echo '</form>
	
	';
	
	echo "</center>";
	
  
  ?>
  
  
</body>

</html>