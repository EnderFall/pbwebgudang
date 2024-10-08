<!DOCTYPE html>
<html>
<head>
	<title>Form Gudang</title>
</head>
<body>
	<h1>Tambah Data</h1>

	<form action="" method="POST">
		<table>
			<tr>
				<td width="120">Nama</td>
				<td><input type="text" size="30"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password"></td>
			</tr>
			<tr>
				<td>ID Pegawai</td>
				<td><input type="member"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="date"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="radio" name="jk">Laki-laki
					<input type="radio" name="jk">Perempuan</td>
			</tr>
			<tr>
				<td>Hobi</td>
				<td><input type="checkbox" name="jk">berenang
				<input type="checkbox" name="jk">Menyanyi</td>
			</tr>

			<tr>
				<td>Jabatan</td>
				<td><select>
					<option>Direktur</option>
					<option>Staf</option>
				</select>
			</tr>

			<tr>
				<td>Alamat</td>
				<td><textarea></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="simpan">
					<input type="reset" value="reset">
					<input type="button" value="kembali">
				</td>
			</tr>



		</table>
</body>
</html>