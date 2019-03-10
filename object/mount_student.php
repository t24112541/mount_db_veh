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

    $que_sh_host=mysqli_query($host_db,"select * from student order by code desc limit {$start} , {$perpage} ");

    $query2=mysqli_query($host_db,"select * from student ");
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
  }
 ?>
<form action="" method="post" class="form-horizontal">
  <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_student_mount">นำเข้าข้อมูล</button>
  <div class="cv_margin_mn" style="float: left">หน้าปัจจุบัน : <?php echo $page; ?>  </div>
  <div class="cv_margin_mn" style="float: left">แสดงข้อมูล : <?php echo $perpage; ?> คน </div>
  <div class="cv_margin_mn" style="float: right">ข้อมูลจำนวน : <?php echo $total_page; ?> หน้า </div>
  <div class="cv_margin_mn" style="float: right">นักเรียนทั้งหมด : <?php echo $total_record; ?> คน </div>
  
<table class="table table-condensed">
    <thead>
      <tr>
        <th>std_code</th>
        <th>std_gender</th>
        <th>std_prename</th>
        <th>std_name</th>
        <th>std_lname</th>
        <th>std_pin_id</th>
        <th>std_birthday</th>
        <th>g_code</th>
        <th>std_tel</th>
        <th>std_tel2</th>
        <th>std_blood</th>

      </tr>
    </thead>
    <tbody>
      
       <?php while($sh_data_host=mysqli_fetch_array($que_sh_host)){ 
     
        ?>
          <tr>
            <td><input type="text" class="form-control"  name="std_code[]" value="<?php echo $sh_data_host['code']; ?>"></td>
            <td><input type="text" class="cv_form-control "  name="std_gender[]" value="<?php echo $sh_data_host['sex']; ?>"></td>
            <td><input type="text" class="cv_form-control" name="std_prename[]" value="<?php echo $sh_data_host['pre_name']; ?>"></td>
            <td><input type="text" class="form-control" name="std_name[]" maxlength="10" value="<?php echo $sh_data_host['fname']; ?>"></td>
            <td><input type="text" class="form-control" name="std_lname[]" value="<?php echo $sh_data_host['lname']; ?>"></td>
            <td><input type="text" class="form-control" name="std_pin_id[]" value="<?php echo $sh_data_host['pin_id']; ?>"></td>
            <td><input type="text" class="form-control" name="std_birthday[]" value="<?php echo $sh_data_host['birt']; ?>"></td>

            <td><input type="text" class="form-control" name="g_code[]" value="<?php echo $sh_data_host['gro']; ?>"></td>

            <td><input type="text" class="form-control" name="std_tel[]" value="<?php echo $sh_data_host['tell1']; ?>"></td>

            <td><input type="text" class="form-control" name="std_tel2[]" value="<?php echo $sh_data_host['tell2']; ?>"></td>

            <td><input type="text" class="form-control" name="std_blood[]" value="<?php echo $sh_data_host['blgr']; ?>"></td>

          </tr>
        <?php }?>
      
    </tbody>
  </table>
  <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_student_mount">นำเข้าข้อมูล</button>
  </form>
  <nav>
     <ul class="pagination">
       <li><a href="?mount_student&&page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
       <?php for($i=1;$i<=$total_page;$i++){ ?>
       <li><a href="?mount_student&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php } ?>
       <li><a href="?mount_student&&page=<?php echo $total_page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
     </ul>
   </nav>

<?php
  if(isset($_POST['btn_student_mount'])){?>
    <div class="log_view">
    <?php 
    $que_target=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_target_id");
    $sh_target=mysqli_fetch_array($que_target);
    $target_db=mysqli_connect($sh_target['my_host'],$sh_target['my_user'],$sh_target['my_pass'],$sh_target['my_name']);
    $target_db->set_charset("utf8");
    if(!$target_db){echo "connect target_db error";}
    else{
      for($i=0;$i<count($_POST['std_code']);$i++){
        // echo $i."<br>";
        // echo $_POST['std_code'][$i]."<br>";
        // echo $_POST['t_name'][$i]."<br>";
        // echo $_POST['t_dep'][$i]."<br>";
        // echo $_POST['t_tel'][$i]."<br>";
        // echo $_POST['t_username'][$i]."<br>";
        // echo $_POST['t_password'][$i]."<br>";
          $chk_std_code=mysqli_query($target_db,"select * from pk_student where std_code='".$_POST['std_code'][$i]."'");
          $num_std_code=mysqli_num_rows($chk_std_code);

          if($num_std_code>0){echo "cannot insert student code ".$_POST['std_code'][$i]." > 0 :$num_std_code<br>";}
          else{
            $sql_target="insert into pk_student (std_code,std_gender,std_prename,std_name,std_lname,std_pin_id,std_birthday,g_code,std_tel,std_tel2,std_blood,std_username,std_password) values ('".$_POST['std_code'][$i]."','".$_POST['std_gender'][$i]."','".$_POST['std_prename'][$i]."','".$_POST['std_name'][$i]."','".$_POST['std_lname'][$i]."','".$_POST['std_pin_id'][$i]."','".$_POST['std_birthday'][$i]."','".$_POST['g_code'][$i]."','".$_POST['std_tel'][$i]."','".$_POST['std_tel2'][$i]."','".$_POST['std_blood'][$i]."','".$_POST['std_code'][$i]."','".$_POST['std_pin_id'][$i]."')";
            $ins_target=mysqli_query($target_db,$sql_target);
            ?>

            <?php
            if(!$ins_target){echo "insert error ".$sql_target;}
            else{
              $last_id = $target_db->insert_id;
              $sql_2="insert into pk_img (img_img,u_code,u_table) values ('veh-u-default.jpg','".$last_id."','pk_student')";
              $que_2=mysqli_query($target_db,$sql_2);
              if(!$que_2){echo "insert error ".$sql_2;}
              else{
                echo "insert student code ".$_POST['std_code'][$i]." OK<br>";
              }
              
            }
          }
        }
      }
    ?>
</div> <?php
  }
?>  


