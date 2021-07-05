
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
	readOutLoud();
	var i=0;
	for(i=0;i<999999999;i++){}
	
	runSpeechRecognition();
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

		<br><br>
 
        <div id="output" class="hide"></div>
		
		
		
		
		
		<?php

$login_id=$_POST['login_id'];
$conn=new mysqli("localhost","root","","project");

$sql="SELECT * FROM record where s_id=$login_id";
$result=$conn->query($sql);
$row=$result->fetch_array();
$d=$row['num_progress'];

$e=$d+1;
$sql="SELECT * FROM numbers where no='$d'";
$result=$conn->query($sql);
$row=$result->fetch_array();
$a=$row['count']+1;



if ($a==5){
	
	$sql="UPDATE record SET num_progress='$e' where s_id=$login_id";
	$conn->query($sql);
	$sql="UPDATE numbers SET count=0 where count=5";
	$conn->query($sql);
}
if($a==5){
	if($e==10){
		$sql="UPDATE record SET num_progress=1 where s_id=$login_id";
		$conn->query($sql);
	}
}
$sql="UPDATE numbers SET count='$a' WHERE no='$d'";
$conn->query($sql);

$pic=$row['pic'];
echo "<img src='$pic' width=20% height='auto'/>";
echo "<textarea id='note-textarea'  placeholder='type something' cols='45' rows='11'>";
echo $row['speech'];
echo "</textarea>";

$gif=$row['gif'];
echo "<img src='$gif' width=20% height='auto'/>";

echo '
		<form action="numbers.php" method="post">
			<input align="right" style="background-color: lightcyan;color:lightcyan;border_color:lightcyan" name="login_id" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="NEXT" />';
		echo '</form>';
	
	
	echo '
		<form action="daily.php" method="post">
			<input align="right" name="login_id" style="background-color: lightcyan;color:lightcyan" value=';echo $login_id;echo ' id="id"/>
			<br>
			<input type="submit" value="Home"/>';
		echo '</form>';

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

<br><br>

    
</center>
</div>
</body>

</html>