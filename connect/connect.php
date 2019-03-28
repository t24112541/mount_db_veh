<?php
/// -------------------  ระบบ ---------------------------
	$my_conn=mysqli_connect("localhost","root","","mount_db");
	$my_conn->set_charset("utf8");
	if(!$my_conn){echo "my_conn error";}

/// -------------------  host=ต้นทาง ---------------------------
	$que_host=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_host_id");
	$sh_host=mysqli_fetch_array($que_host);
	$host_db=mysqli_connect($sh_host['my_host'],$sh_host['my_user'],$sh_host['my_pass'],$sh_host['my_name'],$sh_host['my_port']);
	$host_db->set_charset("utf8");
	if(!$host_db){echo "connect host_db error";}

/// -------------------- target=ปลายทาง -----------------------
	$que_target=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_target_id");
    $sh_target=mysqli_fetch_array($que_target);
    $target_db=mysqli_connect($sh_target['my_host'],$sh_target['my_user'],$sh_target['my_pass'],$sh_target['my_name'],$sh_target['my_port']);
    $target_db->set_charset("utf8");
    if(!$target_db){echo "connect target_db error";}
 ?>