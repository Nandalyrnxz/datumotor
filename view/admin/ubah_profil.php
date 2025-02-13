<div class="col-sm-12 col-md-12">
	<h3  class="section-header" style="font-family:times new roman; text-align: center;">Ubah Password
		<hr>
<form action="" method="POST">
	
	<input type="text" name="newpass" class="form-control" autofocus="yes" placeholder="ketikkan password baru..">
	<label></label>
	<input type="submit" name="simpan" value="Ubah" class="btn btn-block btn-success">
	
</form>
</h3>
</div>


<?php
if(isset($_POST['simpan'])){
	$us=$_GET['id'];
	$np=$_POST['newpass'];
	$edit=mysqli_query($conn,"UPDATE user set password='$np' where username='$us'");
	if ($edit)
	{	
		
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Sukses',
		    text:  'Ubah password berhasil !',
		    icon: 'success',
		    timer: 3000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=profil');
		  } ,3000); 
 		</script>"; 
		
	} 
	else 
	{
		
		echo "<script type='text/javascript'>
		  setTimeout(function () {  
		   swal({
		    title: 'Failed',
		    text:  'Ubah password gagal !',
		    icon: 'error',
		    timer: 3000,
		    showConfirmButton: true
		   });  
		  },10); 
		  window.setTimeout(function(){ 
		   window.location.replace('index.php?hl=profil');
		  } ,3000); 
 		</script>"; 
	}		
}

?>