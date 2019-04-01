
  <div class="list-group">
    <a href="?mount_teacher" class="list-group-item <?php if(isset($_GET['mount_teacher'])){echo 'active';} ?>">ครู</a>
    <a href="?mount_student" class="list-group-item <?php if(isset($_GET['mount_student'])){echo 'active';}?>">นักเรียน</a>
    <a href="?mount_department" class="list-group-item <?php if(isset($_GET['mount_department'])){echo 'active';}?>">แผนกวิชา</a>
    <a href="?mount_group" class="list-group-item <?php if(isset($_GET['mount_group'])){echo 'active';}?>">กลุ่มการเรียน</a>

    <a href="?mount_department_only_std" class="list-group-item <?php if(isset($_GET['mount_department_only_std'])){echo 'active';}?>">ข้อมูลแผนก จาก นักเรียน</a>
    <a href="?mount_group_only_std" class="list-group-item <?php if(isset($_GET['mount_group_only_std'])){echo 'active';}?>">ข้อมูลกลุ่ม จาก นักเรียน</a>

    <div class="menu_padding">
      <a href="?db" class="list-group-item <?php if(isset($_GET['db'])){echo 'active';}?>">ตั้งค่าฐานข้อมูล</a>
      <a href="?get_out!" class="list-group-item <?php if(isset($_GET['get_out!'])){echo 'active';}?>">ออกจากระบบ</a>

    </div>
  </div>

<!-- 
<script type="text/javascript">
    $(document).ready(
     function(){
       $("a").click(function(){
         $("a").toggleClass("active");
       });
     }
   )
</script> -->