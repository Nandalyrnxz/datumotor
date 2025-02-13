<script src="view/admin/sweetalert.min.js"></script>
<script src="view/admin/sweetalert.js"></script>
<?php
session_start();
session_destroy();	
    echo "<script type='text/javascript'>
							  setTimeout(function () {  
							   swal({
							    title: 'Logout Berhasil',
							    text:  '* - *',
							    icon: 'success',
							    timer: 1500,
							    showConfirmButton: true
							   });  
							  },10); 
							  window.setTimeout(function(){ 
							   window.location.replace('index.php');
							  } ,1500); 
					 		</script>"; 
?>