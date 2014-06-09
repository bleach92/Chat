<html>
<head>
<title>Disposable Chat</title>
 <link href="style.css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
function submitChat() {
	  //if the fields are empty, stop
      if (form1.uname.value === '' || form2.msg.value === ''){
          alert('Enter the your username and msg, please');
          return;
      }
	  form1.uname.readOnly = true;
	  form1.uname.style.border = 'none';  //so they can't change their uname
	  document.getElementById('imageload').style.display = 'block'; //just a loading sign
      var uname = form1.uname.value;
      var msg = form2.msg.value;
      var xmlhttp = new XMLHttpRequest();
      
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState== 4 && xmlhttp.status== 200){
              document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
			  document.getElementById('imageload').style.display = 'none'; //take away the loading sign
          }
      }
      xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
      xmlhttp.send();
  } 	// this is the jquery, it fetches the chats every second
	// I don't understand too much but I what it does and thats all I need
	$(document).ready(function(e) {
		$.ajaxSetup({cache:false});
		setInterval(function() {$('#chatlogs').load('logs.php');}, 100);
	})
	function swagDelete(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET','delete.php',true);
			xmlhttp.send();
		}
	window.onkeypress = function(e){
		if(e.keyCode == 13){
			submitChat();
			document.getElementById('message').innerHTML='';
		}
	}
</script>
</head>

<body>
<center>
	<h3>Disposable Chat</h3>
	<form name="form1">
		Enter Your Username: <input type="text" name="uname" style="border:1px solid black" /><br />
	</form>
	<div>
	<div id="imageload" style="display:none">
		<img src="loading.gif" />
	</div>
	<div id="chatlogs">
		LOADING CHAT PLEASE WAIT... <img src="loading.gif" />
		
	</div>

	<form name="form2">
		Your Message: <br/>
		<textarea id='message' name="msg" style='width:200px; height70px'></textarea><br />
	</form>
	<a href="#" onclick="submitChat()" class='button'>Send</a><br /><br />
	<button onclick='swagDelete()'>Delete the Chat</button>
</body>
</html>
