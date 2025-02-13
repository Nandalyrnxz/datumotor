<?php
$query=mysqli_query($conn,"select * from user where username='$_SESSION[username]'");
$data=mysqli_fetch_array($query);
?>
<div class="col-sm-12 col-md-12">
	<h3  class="section-header" style="font-family:times new roman; text-align: center;">Profil User
		<hr>
	<table>
		<tr>
			<th>Username</th>
			<th>:</th>
			<td><?php echo $data['username'];?></td>
		</tr>
		<tr>
			<th>Password</th>
			<th>:</th>
			<td><?php echo $data['password'];?><a href="index.php?hl=ubah_profil&id=<?php echo $data['username']?>"><i> Ubah</i></a></td>
		</tr>
		<tr>
			<th>Nama</th>
			<th>:</th>
			<td><?php echo $data['nama'];?></td>
		</tr>
		<tr>
			<th>Status</th>
			<th>:</th>
			<td><?php echo $data['status'];?></td>
		</tr>

	</table>
</div>