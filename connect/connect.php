<?php
	$my_conn=mysqli_connect("localhost","root","","mount_db");
	$my_conn->set_charset("utf8");
	if(!$my_conn){echo "my_conn error";}

 ?>