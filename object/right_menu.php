<div class="list-group">
  <a href="?mount_teacher" class="list-group-item <?php if(isset($_GET['mount_teacher'])){echo 'active';} ?>">teacher</a>
  <a href="?mount_student" class="list-group-item <?php if(isset($_GET['mount_student'])){echo 'active';}?>">student</a>
  <a href="?mount_department" class="list-group-item <?php if(isset($_GET['mount_department'])){echo 'active';}?>">department</a>
  <a href="?mount_group" class="list-group-item <?php if(isset($_GET['mount_group'])){echo 'active';}?>">group</a>

  <a href="?mount_department_only_std" class="list-group-item <?php if(isset($_GET['mount_department_only_std'])){echo 'active';}?>">department from student</a>
  <a href="?mount_group_only_std" class="list-group-item <?php if(isset($_GET['mount_group_only_std'])){echo 'active';}?>">group from student</a>
</div>

<script type="text/javascript">
    $(document).ready(
     function(){
       $("a").click(function(){
         $("a").toggleClass("active");
       });
     }
   )
</script>