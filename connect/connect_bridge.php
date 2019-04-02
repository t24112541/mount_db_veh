<?php 
/// -------------------  host=ต้นทาง ---------------------------
	$que_host=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_host_id");
	$sh_host=mysqli_fetch_array($que_host);
	echo $sh_host['my_host']."<br>";
	echo $sh_host['my_user']."<br>";
	echo $sh_host['my_pass']."<br>";
	echo $sh_host['my_name']."<br>";
	echo $sh_host['my_port']."<br>";

	$host_db=mysqli_connect($sh_host['my_host'],$sh_host['my_user'],$sh_host['my_pass'],$sh_host['my_name'],$sh_host['my_port']) or die("connect host_db error");
	$host_db->set_charset("utf8");
	if(!$host_db){echo "please check syntax on host_db";}

// /// -------------------- target=ปลายทาง -----------------------
	$que_target=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_target_id");
    $sh_target=mysqli_fetch_array($que_target);
    $target_db=mysqli_connect($sh_target['my_host'],$sh_target['my_user'],$sh_target['my_pass'],$sh_target['my_name'],$sh_target['my_port']) or die("connect target_db error");
    $target_db->set_charset("utf8");
    if(!$target_db){echo "please check syntax on target_db";}

    ?>