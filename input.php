<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah Data</h3>
<hr>
<form method="POST">
<table>
	<tr>
		<td>Nama Relawan</td>
		<td>:</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Besaran</td>
		<td>:</td>
		<td><input type="text" name="besar"></td>
	</tr>
	<tr>
		<td>Zakat</td>
		<td>:</td>
		<td><select name="zakatnya">
			<?php
   
                                 include 'koneksi.php';
                                
                                  $sql="select * from zakat";

                                  $hasil=mysqli_query($db,$sql);
                                  
                                  while ($data = mysqli_fetch_array($hasil)) {
                                  
                                 ?>
                                  <option value="<?php echo $data['id_zakat'];?>"><?php echo $data['nama_zakat'];?></option>
                                <?php 
                                }
                                ?>
                              
                  </select>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>:</td>
		<td><input type="text" name="hp"></td>
	</tr>
	<tr>
		<td>Nama Bank</td>
		<td>:</td>
		<td><input type="text" name="nm_bank"></td>
	</tr>
	<tr>
		<td>No Rekening</td>
		<td>:</td>
		<td><input type="text" name="norek"></td>
	</tr>
</table>
<input type="submit" name="simpan" value="Simpan">
</form>
<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$besar = $_POST['besar'];
	$nm_z = $_POST['zakatnya'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];
	$n_bank = $_POST['nm_bank'];
	$norek = $_POST['norek'];

	$query = mysqli_query($db, "INSERT INTO pembayaran(id_zakat,nama,jumlah,hp,email,bank,no_bank) 
			VALUES ('$nm_z','$nama','$besar','$hp','$email','$n_bank','$norek')");
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		echo '<script LANGUAGE="JavaScript">
            alert(" Data Berhasil Tersimpan")
            window.location.href="buktipembayaran.php";
            </script>'; 
	} else {
		// jika gagal tampilkan pesan kesalahan
		echo '<script LANGUAGE="JavaScript">
            alert(" Data Gagal Tersimpan")
            window.location.href="buktipembayaran.php";
            </script>'; 
	}

}

?>
</body>
</html>