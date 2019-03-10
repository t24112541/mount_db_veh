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

    $que_sh_host=mysqli_query($host_db,"select * from depart order by depcode desc limit {$start} , {$perpage} ");

    $query2=mysqli_query($host_db,"select * from depart ");
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
  }
 ?>
<form action="" method="post" class="form-horizontal">
  <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_department_mount">นำเข้าข้อมูล</button>
  <div class="cv_margin_mn" style="float: left">หน้าปัจจุบัน : <?php echo $page; ?>  </div>
  <div class="cv_margin_mn" style="float: left">แสดงข้อมูล : <?php echo $perpage; ?> แผนก </div>
  <div class="cv_margin_mn" style="float: right">ข้อมูลจำนวน : <?php echo $total_page; ?> หน้า </div>
  <div class="cv_margin_mn" style="float: right">แผนกทั้งหมด : <?php echo $total_record; ?> แผนก </div>
  
<table class="table table-condensed">
    <thead>
      <tr>
        <th>d_code</th>
        <th>d_name</th>
       
      </tr>
    </thead>
    <tbody>
      
       <?php while($sh_data_host=mysqli_fetch_array($que_sh_host)){ 
     
        ?>
          <tr>
            <td><input type="text" class="form-control"  name="d_code[]" value="<?php echo $sh_data_host['depcode']; ?>"></td>
            <td><input type="text" class="cv_form-control "  name="d_name[]" value="<?php echo $sh_data_host['depname']; ?>"></td>
         
          </tr>
        <?php }?>
      
    </tbody>
  </table>
<!--   <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_department_mount">นำเข้าข้อมูล</button>
 -->  </form>
  <nav style="margin-top:10px"> 
     <ul class="pagination">
       <li><a href="?mount_department&&page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
       <?php for($i=1;$i<=$total_page;$i++){ ?>
       <li><a href="?mount_department&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php } ?>
       <li><a href="?mount_department&&page=<?php echo $total_page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
     </ul>
   </nav>

<?php
  if(isset($_POST['btn_department_mount'])){?>
    <div class="log_view">
    <?php 
    $que_target=mysqli_query($my_conn,"select * from my_mount,my_match where my_mount.my_id=my_match.m_target_id");
    $sh_target=mysqli_fetch_array($que_target);
    $target_db=mysqli_connect($sh_target['my_host'],$sh_target['my_user'],$sh_target['my_pass'],$sh_target['my_name']);
    $target_db->set_charset("utf8");
    if(!$target_db){echo "connect target_db error";}
    else{
      for($i=0;$i<count($_POST['d_code']);$i++){

          $chk_department_code=mysqli_query($target_db,"select * from pk_department where d_code='".$_POST['d_code'][$i]."'");
          $num_department_code=mysqli_num_rows($chk_department_code);

          if($num_department_code>0){echo "cannot insert department code ".$_POST['d_code'][$i]." > 0 :$num_department_code<br>";}
          else{
            $sql_target="insert into pk_department (d_code,d_name) values ('".$_POST['d_code'][$i]."','".$_POST['d_name'][$i]."')";
            $ins_target=mysqli_query($target_db,$sql_target);
                echo "insert department code ".$_POST['d_code'][$i]." OK<br>";

          }
        }
      }
    ?>
</div> <?php
  }
?>  


