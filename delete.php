<?php
$con = mysqli_connect('localhost:3306','root','');
mysqli_select_db($con, 'chatbox');

mysqli_query($con,"DELETE FROM logs");
?>