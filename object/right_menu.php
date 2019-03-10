<div class="list-group">
  <a href="?mount_teacher" class="list-group-item <?php if(isset($_GET['mount_teacher'])){echo 'active';} ?>">teacher</a>
  <a href="?mount_student" class="list-group-item <?php if(isset($_GET['mount_student'])){echo 'active';}?>">student</a>
  <a href="?mount_department" class="list-group-item <?php if(isset($_GET['mount_department'])){echo 'active';}?>">department</a>
  <a href="?mount_group" class="list-group-item <?php if(isset($_GET['mount_group'])){echo 'active';}?>">group</a>
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