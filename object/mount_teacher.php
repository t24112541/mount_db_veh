<?php
  $que_host=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_host_id");
  $sh_host=mysqli_fetch_array($que_host);
  $host_db=mysqli_connect($sh_host['my_host'],$sh_host['my_user'],$sh_host['my_pass'],$sh_host['my_name']);
  $host_db->set_charset("utf8");
  if(!$host_db){echo "connect host_db error";}
  else{
    $perpage = 50;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }else {
      $page = 1;
    }
     
     $start = ($page - 1) * $perpage;

    $que_sh_host=mysqli_query($host_db,"select * from teacher inner join depart on teacher.teacher_dep = depart.depname limit {$start} , {$perpage} ");

    $query2=mysqli_query($host_db,"select * from teacher inner join depart on teacher.teacher_dep = depart.depname ");
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
  }
 ?>
<form action="" method="post" class="form-horizontal">
  <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_teacher_mount">นำเข้าข้อมูล</button>
  <div class="cv_margin_mn" style="float: left">หน้าปัจจุบัน : <?php echo $page; ?>  </div>
  <div class="cv_margin_mn" style="float: left">แสดงข้อมูล : <?php echo $perpage; ?> คน </div>
  <div class="cv_margin_mn" style="float: right">ข้อมูลจำนวน : <?php echo $total_page; ?> หน้า </div>
  <div class="cv_margin_mn" style="float: right">ครู/บุคลากร : <?php echo $total_record; ?> คน </div>
  
<table class="table table-condensed">
    <thead>
      <tr>
        <th>t_code</th>
        <th>t_name</th>
<!--         <th>t_dep</th> -->
        <th>t_tel</th>
        <th>t_username</th>
        <th>t_password</th>
      </tr>
    </thead>
    <tbody>
      
       <?php while($sh_data_host=mysqli_fetch_array($que_sh_host)){ 
        $j_person=mysqli_query($host_db,"select * from person where username='".$sh_data_host['teacher_code']."'");
        while($sh_j_ps=mysqli_fetch_array($j_person)){
        ?>
          <tr>
            <td><input type="text" class="form-control"  name="t_code[]" value="<?php echo $sh_data_host['teacher_code']; ?>"></td>
            <td><input type="text" class="cv_form-control "  name="t_name[]" value="<?php echo $sh_data_host['teacher_name']; ?>"></td>
            <input type="hidden" class="cv_form-control" name="t_dep[]" value="<?php echo $sh_data_host['depcode']; ?>">
            <td><input type="text" class="form-control" name="t_tel[]" maxlength="10" value="<?php echo $sh_data_host['teacher_tel']; ?>"></td>
            <td><input type="text" class="form-control" name="t_username[]" value="<?php echo $sh_j_ps['username']; ?>"></td>
            <td><input type="text" class="form-control" name="t_password[]" value="<?php echo $sh_j_ps['password']; ?>"></td>
          </tr>
        <?php }}?>
      
    </tbody>
  </table>
  
  </form>
  <nav>
     <ul class="pagination">
       <li><a href="?mount_student&&page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
       <?php for($i=1;$i<=$total_page;$i++){ ?>
       <li><a href="?mount_teacher&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php } ?>
       <li><a href="?mount_teacher&&page=<?php echo $total_page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
     </ul>
   </nav>
<?php
  if(isset($_POST['btn_teacher_mount'])){?>
    <div class="log_view">
    <?php 
    $que_target=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_target_id");
    $sh_target=mysqli_fetch_array($que_target);
    $target_db=mysqli_connect($sh_target['my_host'],$sh_target['my_user'],$sh_target['my_pass'],$sh_target['my_name']);
    $target_db->set_charset("utf8");
    if(!$target_db){echo "connect target_db error";}
    for($i=0;$i<count($_POST['t_code']);$i++){
      // echo $i."<br>";
      // echo $_POST['t_code'][$i]."<br>";
      // echo $_POST['t_name'][$i]."<br>";
      // echo $_POST['t_dep'][$i]."<br>";
      // echo $_POST['t_tel'][$i]."<br>";
      // echo $_POST['t_username'][$i]."<br>";
      // echo $_POST['t_password'][$i]."<br>";
      $chk_t_code=mysqli_query($target_db,"select * from pk_teacher where t_code='".$_POST['t_code'][$i]."'");
      $num_t_code=mysqli_num_rows($chk_t_code);

      if($num_t_code>0){echo "cannot insert teacher code ".$_POST['t_code'][$i]." > 0 :$num_t_code<br>";}
      else{
        $sql_target="insert into pk_teacher (t_code,t_name,t_dep,t_tel,t_username,t_password) values ('".$_POST['t_code'][$i]."','".$_POST['t_name'][$i]."','".$_POST['t_dep'][$i]."','".$_POST['t_tel'][$i]."','".$_POST['t_username'][$i]."','".$_POST['t_password'][$i]."')";
        $ins_target=mysqli_query($target_db,$sql_target);
        ?>

        <?php
        if(!$ins_target){echo "insert error".$sql_target;}
        else{
          $last_id = $target_db->insert_id;
          $sql_2="insert into pk_img (img_img,u_code,u_table) values ('veh-u-default.jpg','".$last_id."','pk_teacher')";
          $que_2=mysqli_query($target_db,$sql_2);
          if(!$que_2){echo "insert error ".$sql_2;}
          else{
            $que_gro_1=mysqli_query($host_db,"select * from teacher inner join depart on teacher.teacher_dep = depart.depname where teacher.teacher_code='".$_POST['t_code'][$i]."'");
            $sh_gro=mysqli_fetch_array($que_gro_1);
            $que_3=mysqli_query($target_db,"insert into pk_match_std_tch (t_id,g_code) values ('".$last_id."','".$sh_gro['std_gro1']."')");
            $que_4=mysqli_query($target_db,"insert into pk_match_std_tch (t_id,g_code) values ('".$last_id."','".$sh_gro['std_gro2']."')");
            $que_5=mysqli_query($target_db,"insert into pk_match_std_tch (t_id,g_code) values ('".$last_id."','".$sh_gro['std_gro3']."')");
            $que_6=mysqli_query($target_db,"insert into pk_match_std_tch (t_id,g_code) values ('".$last_id."','".$sh_gro['std_gro4']."')");
             echo "insert teacher code ".$_POST['t_code'][$i]." OK<br>";
          }
        }
      } 

    }
    ?>
</div> <?php
  }
?>  
