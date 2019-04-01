<?php  //,my_mount where my_match.m_host_id=my_mount.my_id && my_match.m_target_id=my_mount.my_id
$que_db=mysqli_query($my_conn,"select * from my_match where m_id='1'");
$num_db=mysqli_num_rows($que_db);
$sh_db=mysqli_fetch_array($que_db);

$que_host=mysqli_query($my_conn,"select * from my_mount where my_id='".$sh_db['m_host_id']."'");
$num_host=mysqli_num_rows($que_host);
$sh_host=mysqli_fetch_array($que_host);

$que_target=mysqli_query($my_conn,"select * from my_mount where my_id='".$sh_db['m_target_id']."'");
$num_target=mysqli_num_rows($que_target);
$sh_target=mysqli_fetch_array($que_target);

if(isset($_POST['host_save'])&&$_POST['my_host']!=''&&$_POST['my_port']!=''&&$_POST['my_name']!=''&&$_POST['my_username']!=''){
	$sql="update my_mount set my_host='".$_POST['my_host']."', my_port='".$_POST['my_port']."', my_name='".$_POST['my_name']."', my_user='".$_POST['my_username']."', my_pass='".$_POST['my_pass']."' where my_id='".$_POST['my_id']."'";
	$que=mysqli_query($my_conn,$sql)or die("update error '".$sql."'");
	if($que){echo "<meta http-equiv='refresh' content='0;url=?db&&saved'>";}
}
if(isset($_POST['target_save'])&&$_POST['my_host']!=''&&$_POST['my_port']!=''&&$_POST['my_name']!=''&&$_POST['my_username']!=''){
	$sql="update my_mount set my_host='".$_POST['my_host']."', my_port='".$_POST['my_port']."', my_name='".$_POST['my_name']."', my_user='".$_POST['my_username']."', my_pass='".$_POST['my_pass']."' where my_id='".$_POST['my_id']."'";
	$que=mysqli_query($my_conn,$sql)or die("update error '".$sql."'");
	if($que){echo "<meta http-equiv='refresh' content='0;url=?db&&saved'>";}
}

?>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">ฐานข้อมูลงานทะเบียน</a></li>
    <li><a data-toggle="tab" href="#menu1">ฐานข้อมูลระบบบริหารจัดการพาหนะ</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <form class="form-horizontal box-content" method="POST" action="">
      	<h3>ฐานข้อมูลงานทะเบียน</h3>
		<div style="">

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Username">host name/ip address:</label>
		    <div class="col-sm-10">
		    	<input type="hidden" name="my_id" value="<?php echo $sh_host['my_id'] ?>">
		      	<input type="text" class="form-control" name="my_host" placeholder="Enter host name/ip address" value="<?php echo $sh_host['my_host'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">port:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_port" placeholder="Enter port" value="<?php echo $sh_host['my_port'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">database name:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_name" placeholder="Enter database" value="<?php echo $sh_host['my_name'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">username:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_username" placeholder="Enter username" value="<?php echo $sh_host['my_user'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" class="form-control" name="my_pass" placeholder="Enter password" value="<?php echo $sh_host['my_pass'] ?>">
		    </div>
		  </div>
		 <div class="form-group">
		    
		    <div class="col-sm-12 "> 
		      <p align="center" class="cv_important" id="war"></p>
		    </div>
		  </div>
		  <div class="form-group" style="text-align: center;"> 
		    <div class="col-sm-12">
		      <button type="submit" name="host_save" class="cv_btn btn-ok">บันทึกการเปลี่ยนแปลง</button>
		    </div>
		  </div>
		  <?php if(isset($_GET['saved'])): ?>
		  <div  class="form-group" style="text-align: center;font-size: 64px;color:#4c9e33">
		  	<span id="update_ok"  class="glyphicon glyphicon-ok-circle"></span>
		  </div>
		<?php endif ?>
		</div>
	</form>



    </div>
    <div id="menu1" class="tab-pane fade">
      
      
	<form class="form-horizontal box-content" method="POST" action="">
		<div style="">
			<h3>ฐานข้อมูลระบบบริหารจัดการพาหนะ</h3>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Username">host name/ip address:</label>
		    <div class="col-sm-10">
		    	<input type="hidden" name="my_id" value="<?php echo $sh_target['my_id'] ?>">
		      	<input type="text" class="form-control" name="my_host" placeholder="Enter host name/ip address" value="<?php echo $sh_target['my_host'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">port:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_port" placeholder="Enter port" value="<?php echo $sh_target['my_port'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">database name:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_name" placeholder="Enter database" value="<?php echo $sh_target['my_name'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">username:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="my_username" placeholder="Enter username" value="<?php echo $sh_target['my_user'] ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="Password">password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" class="form-control" name="my_pass" placeholder="Enter password" value="<?php echo $sh_target['my_pass'] ?>">
		    </div>
		  </div>
		 <div class="form-group">
		    
		    <div class="col-sm-12 "> 
		      <p align="center" class="cv_important" id="war"></p>
		    </div>
		  </div>
		  <div class="form-group" style="text-align: center;"> 
		    <div class="col-sm-12">
		      <button type="submit" name="target_save" class="cv_btn btn-ok">บันทึกการเปลี่ยนแปลง</button>
		    </div>
		  </div>
		  <?php if(isset($_GET['saved'])): ?>
		  <div  class="form-group" style="text-align: center;font-size: 64px;color:#4c9e33">
		  	<span id="update_ok2"  class="glyphicon glyphicon-ok-circle"></span>
		  </div>
		<?php endif ?>
		</div>
	</form>



    </div>
  </div>

<script>
$(document).ready(function(){

    $("#update_ok").fadeOut(3000);
    $("#update_ok2").fadeOut(3000);
	
});
</script>

