
<html>

<head>
  <title>
    daily task
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <link rel="stylesheet" href="styles.css">


<script>
function readOutLoud() {
var speech = new SpeechSynthesisUtterance();
message=document.getElementById('note-textarea').value;
// Set the text and voice attributes.
speech.text = message;
speech.volume = 1;
speech.rate = 0.7;
speech.pitch = 1;

window.speechSynthesis.speak(speech);
}


function starting(){
	var i=0,j=0;
	for(i=0;i<5;i++){
		readOutLoud();		
		for(j=0;j<5;j++)
		runSpeechRecognition();
		var input=document.getElementById("output").value;
		var message=document.getElementById('note-textarea').value;
		if(input==message){
			alert("Correct ......Answer");
		}
	}
}

</script>





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

<body style="background-color: lightcyan;" onload="starting();">
<center>

		<br><br><br><br><br><br><br><br><br><br>
 
        <div id="output" class="hide"></div>
		
		
		
		
		
		<?php

$login_id=$_POST['login_id'];
$conn=new mysqli("localhost","root","","project");

$sql="SELECT * FROM record where s_id=$login_id";
$result=$conn->query($sql);
$row=$result->fetch_array();
$d=$row['homework'];
$e=$d+1;
$sql="SELECT * FROM hw where no='$d'";
$result=$conn->query($sql);
$row=$result->fetch_array();

	$sql="UPDATE record SET homework='$e'";
	$conn->query($sql);
	

echo "<textarea id='note-textarea'  placeholder='type something' cols='45' rows='11'>";
echo $row['speech'];
echo "</textarea>";


$sql="select * from hw";
if($result=$conn->query($sql))
{
	if($result->num_rows>0)
	{
		while($row=$result->fetch_array())
		{
			$last=$row['no'];
		}
		if($d==$last){
				echo "<h2>Well Done You Done Your Homework Complete</h2>";
				$sql="UPDATE record SET homework=1";
				$conn->query($sql);
				echo "<a href='daily.php'>Home</a>";
			}
	}
}

echo '
		<form action="homework.php" method="post">
			<input align="right" name="login_id" style="background-color: lightcyan;color:lightcyan" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="NEXT" />';
		echo '</form>
	
	';
	
	echo '
		<form action="daily.php" method="post">
			<input align="right" name="login_id"  style="background-color: lightcyan;color:lightcyan"  value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="Home" />';
		echo '</form>
	
	';

$conn->close();
?>
		
		
		
		
		
		<script>
			/* JS comes here */
		    function runSpeechRecognition() {
		        // get output div reference
		        var output = document.getElementById("note-textarea");
		        // get action element reference
		        var action = document.getElementById("action");
                // new speech recognition object
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var recognition = new SpeechRecognition();
            
                // This runs when the speech recognition service starts
                recognition.onstart = function() {
                    action.innerHTML = "<small>listening, please speak...</small>";
                };
                
                recognition.onspeechend = function() {
                    action.innerHTML = "<small>stopped listening, hope you are done...</small>";
                    recognition.stop();
                }
              
                // This runs when the speech recognition service returns result
                recognition.onresult = function(event) {
                    var transcript = event.results[0][0].transcript;
                    
                    output.innerHTML = transcript;
                    output.classList.remove("hide");
					
					 readOutLoud();
				 
					
                };
              
                 // start recognition
                 recognition.start();
				 
				 
				
	        }
		</script>
		


  <div class="container">
   
</center>
</div>
</body>

</html>