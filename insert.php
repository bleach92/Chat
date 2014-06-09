<?php
// the username and msg passed from js
$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];


//connect to the mysql and select the database
$con = mysqli_connect('localhost:3306','root','');
mysqli_select_db($con, 'chatbox');

//this  is supposed to insert username and msg in to database
mysqli_query($con,"INSERT INTO logs (username, msg) VALUES ('$uname', '$msg')");

//get the chat in order
$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id ASC");

//show the chat
while($extract = mysqli_fetch_array($result1)) {
		echo "<span class='uname'>" . $extract['username'] . "<span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}

?>