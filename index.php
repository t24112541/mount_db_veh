<?php
	include "./connect/connect.php";
	include "include_bootstrap.html";
 ?>
 <html lang="en">
<head>
	<title>Veh Mount DB</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
<?php 

  // include "object/nav.php";
  //include "test/nav.php"; ?>
  <div class="container-fluid" style="margin-top:60px">
    <div class="row">

    	<div class="col-sm-3"><?php include "object/right_menu.php"; ?></div>
    	<div class="col-sm-9">
    		<?php 
    			if(isset($_GET['mount_teacher'])){include "./object/mount_teacher.php";}
          else if(isset($_GET['mount_student'])){include "./object/mount_student.php";}
          else if(isset($_GET['mount_department'])){include "./object/mount_department.php";}
          else if(isset($_GET['mount_group'])){include "./object/mount_group.php";}
    		 ?>
    	</div>
    	<div class="col-sm-3"></div>	

    </div>
  </div>


</body>
</html>
