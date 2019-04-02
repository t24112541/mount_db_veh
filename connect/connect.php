<?php
// error_reporting(0);
// $arr = array('host'=> 'localhost' ,'username'=>'root' ,'password'=>'' ,'db'=>'mount_db','port'=>'3306' );
// file_put_contents('./db/db_main.txt',  json_encode($arr).PHP_EOL);

$my_arr = json_decode(file_get_contents('./db/db_main.txt'), true)  or die("Unable to open file!");

$host=$my_arr['host'];
$username=$my_arr['username'];
$password=$my_arr['password'];
$db=$my_arr['db'];
$port=$my_arr['port'];


/// -------------------  ระบบ ---------------------------
	$my_conn=mysqli_connect($host,$username,$password,$db,$port);
	if (mysqli_connect_errno()){ 
		$_SESSION['db_status']="main_db_fail";
	}else{
		$my_conn->set_charset("utf8");
		if(!$my_conn){echo "please check syntax on my_conn";}
	}

 ?>