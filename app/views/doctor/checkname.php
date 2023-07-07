<?php
if($info==0){
?>
<div style="color:green">This name is aviaible for you</div>
<script>
   document.getElementById('dname').value="";
</script>
<?php }else{ ?>
<div style="color:red">This name is not aviaible for you</div>
<?php } ?>
