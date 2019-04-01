<?php
if(isset($_SESSION['db_status'])&&$_SESSION['db_status']=="main_db_fail"){
		$my_arr = json_decode(file_get_contents('./db/db_main.txt'), true)  or die("Unable to open file!");
		$host=$my_arr['host'];
		$username=$my_arr['username'];
		$password=$my_arr['password'];
		$db=$my_arr['db'];
		$port=$my_arr['port'];
		if(isset($_POST['db_save']) &&$_POST['host']!='' &&$_POST['port']!='' &&$_POST['db']!='' &&$_POST['username']!='' ){
			$arr = array('host'=> $_POST['host'] ,'username'=> $_POST['username'],'password'=> $_POST['password'],'db'=>$_POST['db'],'port'=>$_POST['port'] );
			file_put_contents('./db/db_main.txt',  json_encode($arr).PHP_EOL);
			session_destroy();
			echo "<meta http-equiv='refresh' content='0;url=?'>";
		}
?>
		<div class="col-sm-12">
		<form class="form-horizontal box-content" method="POST" action="">
	      	<h3>ฐานข้อมูลงานทะเบียน</h3>
			<div style="">

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Username">host name/ip address:</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="host" placeholder="Enter host name/ip address" value="<?php echo $host ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Password">port:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" name="port" placeholder="Enter port" value="<?php echo $port ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Password">database name:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" name="db" placeholder="Enter database" value="<?php echo $db ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Password">username:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $username ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="Password">password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo $password ?>">
			    </div>
			  </div>
			 <div class="form-group">
			    
			    <div class="col-sm-12 "> 
			      <p align="center" class="cv_important" id="war"></p>
			    </div>
			  </div>
			  <div class="form-group" style="text-align: center;"> 
			    <div class="col-sm-12">
			      <button type="submit" name="db_save" class="cv_btn btn-ok">บันทึกการเปลี่ยนแปลง</button>
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
<?php } else{?>
<div class="col-sm-4 col-lg-7">
	<div class="font_size-md">
		ระบบนำเข้าข้อมูล
	</div>
	<div class="font_size-sm">
		สำหรับระบบบริหารจัดการพาหนะ วิทยาลัยเทคนิคชัยภูมิ
	</div>
	<div class="font_size-sm box-padding-sm" align="center">
		<img src="./img/mount_db.png" style="width:100%">
	</div>
</div>
<div class="col-sm-4 col-lg-5" >
	<form class="form-horizontal box-content" style="height: 80%;" method="POST" action="">
		
		<div style="padding-top: 10%">
			<div class="form-group" align="center">
			    <img src="./img/logo_2.png" style="width:30%">
			</div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Username:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="ad_username" placeholder="Enter username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" name="ad_password" placeholder="Enter password">
			    </div>
			  </div>
			 <div class="form-group">
			    
			    <div class="col-sm-12 "> 
			      <p align="center" class="cv_important" id="war"></p>
			    </div>
			  </div>
			  <div class="form-group" style="text-align: center;padding-top:10%"> 
			    <div class="col-sm-12">
			      <button type="submit" class="cv_btn btn-ok">login</button>
			    </div>
			  </div>
		</div>
	</form>
</div>

<?php }
if(isset($_POST['ad_username']) && $_POST['ad_username']!='' && isset($_POST['ad_password']) && $_POST['ad_password']!=''){

	// $ins=mysqli_query($my_conn,"insert into my_admin (ad_username,ad_password) values ('".md5(md5(md5($_POST['ad_username'])))."','".md5(md5(md5($_POST['ad_password'])))."') ") or die ("insert error");

	$que=mysqli_query($my_conn,"select * from my_admin where ad_username='".$_POST['ad_username']."' && ad_password='".md5(md5(md5($_POST['ad_password'])))."'");
	$num_chk=mysqli_num_rows($que);
	$sh=mysqli_fetch_array($que);
	if($num_chk==1){
		$_SESSION['ad_username']=$sh['ad_username'];
		$_SESSION['ad_password']=$sh['ad_password'];
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?db\">";
	}else{?>
		<script type="text/javascript">
			document.getElementById("war").innerHTML ="โปรดตรวจสอบ username หรือ password!";
		</script>
	<?php }

}
?>