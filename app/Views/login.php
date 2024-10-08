<div class ="container mt-3">
<form action="<?= base_url('home/aksi_login'); ?>" method="POST">
<table>
	<tr>
		<td>Username</td>
		<td><input type="email" class="form-control" placeholder="Masukkan Nama" name="nama" required></td>
</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" class="form-control" placeholder="Masukkan Password" name="pass" required></td>
	</tr>
</table>
</div>

<div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me
    </label>
  </div>

<div>
<table>
	<tr>
				<td></td>
				<a href="<?= base_url('home/halamanutama'); ?>"> <button class="btn btn-success" type="submit">Login</button></a>
					<button type="reset" class= "btn btn-danger">Reset</button>
					<button type="button" class= "btn btn-secondary">Kembali</button>
				</td>
			</tr>
			
</table>
</div>




