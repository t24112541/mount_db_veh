<?php

    $perpage = 50;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }else {
      $page = 1;
    }
     
     $start = ($page - 1) * $perpage;

    $que_sh_host=mysqli_query($host_db,"select gro,depwork from student group by gro,depwork order by gro desc limit {$start} , {$perpage} ");

    $query2=mysqli_query($host_db,"select gro,depwork from student group by gro,depwork ");
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
  
 ?>
<form action="" method="post" class="form-horizontal">
  <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_group_mount">นำเข้าข้อมูล</button>
  <div class="cv_margin_mn" style="float: left">หน้าปัจจุบัน : <?php echo $page; ?>  </div>
  <div class="cv_margin_mn" style="float: left">แสดงข้อมูล : <?php echo $perpage; ?> กลุ่ม </div>
  <div class="cv_margin_mn" style="float: right">ข้อมูลจำนวน : <?php echo $total_page; ?> หน้า </div>
  <div class="cv_margin_mn" style="float: right">กลุ่มทั้งหมด : <?php echo $total_record; ?> กลุ่ม </div>
  
<table class="table table-condensed">
    <thead>
      <tr>
        <th>g_code</th>
        <th>g_name</th>
        <th>d_code</th>
       
      </tr>
    </thead>
    <tbody>
      
       <?php while($sh_data_host=mysqli_fetch_array($que_sh_host)){ 
     
        ?>
          <tr>
            <td><input type="text" class="form-control"  name="g_code[]" value="<?php echo $sh_data_host['gro']; ?>"></td>
            <td><input type="text" class="cv_form-control "  name="g_name[]" value="<?php echo $sh_data_host['gro']; ?>"></td>
            <td>
              <?php echo $sh_data_host['depwork']; ?>
              <input type="hidden" class="cv_form-control "  name="d_code[]" value="<?php echo $sh_data_host['depwork']; ?>">
            </td>
         
          </tr>
        <?php }?>
      
    </tbody>
  </table>
<!--   <button class="cv_btn btn-ok" style="float: left" type="submit" name="btn_department_mount">นำเข้าข้อมูล</button>
 -->  </form>
  <nav style="margin-top:10px"> 
     <ul class="pagination">
       <li><a href="?mount_group&&page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
       <?php for($i=1;$i<=$total_page;$i++){ ?>
       <li><a href="?mount_group&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php } ?>
       <li><a href="?mount_group&&page=<?php echo $total_page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
     </ul>
   </nav>

<?php
  if(isset($_POST['btn_group_mount'])){?>
    <div class="log_view">
    <?php 
      for($i=0;$i<count($_POST['d_code']);$i++){

          $chk_group_code=mysqli_query($target_db,"select * from pk_group where g_code='".$_POST['g_code'][$i]."'");
          $num_group_code=mysqli_num_rows($chk_group_code);

          if($num_group_code>0){echo "cannot insert group code ".$_POST['g_code'][$i]." > 0 :$num_group_code<br>";}
          else{
            $sql_target="insert into pk_group (g_code,g_name,d_code) values ('".$_POST['g_code'][$i]."','".$_POST['g_name'][$i]."','".$_POST['d_code'][$i]."')";
            $ins_target=mysqli_query($target_db,$sql_target);
                echo "insert group code ".$_POST['g_code'][$i]." OK<br>"; 
          }
        }
    ?>
</div> <?php
  }
?>  


