<?php session_start();
	include "./connect/connect.php";
	include "include_bootstrap.html";
 ?>
 <html lang="en">
<head>
	<title>Veh Mount DB</title>
  <link rel="shortcut icon" href="img/logo.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
<?php 

  // include "object/nav.php";
  //include "test/nav.php"; ?>
  <div class="container-fluid" style="margin-top:60px">
    <div class="row">
<?php 
if(isset($_SESSION['ad_username'])&&$_SESSION['ad_username']!=''&&isset($_SESSION['ad_password'])&&$_SESSION['ad_password']!=''){
  if(isset($_GET['mount_teacher'])||isset($_GET['mount_student'])||isset($_GET['mount_department'])||isset($_GET['mount_department_only_std'])||isset($_GET['mount_group'])||isset($_GET['mount_group_only_std'])||isset($_GET['db'])){?>

    	<div class="col-sm-3"><?php include "object/right_menu.php"; ?></div>
    	<div class="col-sm-9">
    		<?php 
    			if(isset($_GET['mount_teacher'])){include "./connect/connect_bridge.php";include "./object/mount_teacher.php";}
          else if(isset($_GET['mount_student'])){include "./connect/connect_bridge.php";include "./object/mount_student.php";}
          else if(isset($_GET['mount_department'])){include "./connect/connect_bridge.php";include "./object/mount_department.php";}
          else if(isset($_GET['mount_department_only_std'])){include "./connect/connect_bridge.php";include "./object/mount_department_only_std.php";}
          else if(isset($_GET['mount_group'])){include "./connect/connect_bridge.php";include "./object/mount_group.php";}
          else if(isset($_GET['mount_group_only_std'])){include "./connect/connect_bridge.php";include "./object/mount_group_only_std.php";}
          else if(isset($_GET['db'])){include "./object/db.php";}
          
    		 ?>
    	</div>
    	<div class="col-sm-3"></div>	
    <?php } }
    else{include "./object/login.php";}

    if(isset($_GET['get_out!'])){
      session_destroy();
      echo "<meta http-equiv='refresh' content='0;url=?'>";
    }
?>
    </div>
  </div>


</body>
</html>
