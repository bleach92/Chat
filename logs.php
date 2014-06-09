<?php
//connecting to mysql
$con = mysqli_connect('localhost:3306','root','');

//selecting database
mysqli_select_db($con, 'chatbox');

//get the chat
$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id ASC");

//show the chat
while($extract = mysqli_fetch_array($result1)) {
		echo "<span class='uname'>" . $extract['username'] . "<span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}

?>