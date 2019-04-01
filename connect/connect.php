<?php
// error_reporting(0);
/// -------------------  ระบบ ---------------------------
	$my_conn=mysqli_connect("localhost","root","","mount_db") or die("my_conn error");
	$my_conn->set_charset("utf8");
	if(!$my_conn){echo "please check syntax on my_conn";}

 ?>