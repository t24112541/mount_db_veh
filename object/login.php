

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

<?php 
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