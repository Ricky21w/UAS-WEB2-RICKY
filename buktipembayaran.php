<?php 

session_start();


if($_SESSION['status']!="sudah_login"){

header("location:index.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Zakat</title>
</head>
<body>
Selamat datang : <?php echo $_SESSION['nama']; ?></h1> <a href="logout.php">Logout</a>
<hr>
<center>
	<h3>Data Pembayaran Zakat<br>
	Per <?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";

?> . 
</h3>
	
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Zakat</th>
			<th>Nominal</th>
			<th>Nama Lengkap</th>
			<th>No. Hp</th>
			<th>Email</th>
			<th>Nama Bank</th>
			<th>No rekening</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
			include 'koneksi.php';
		$no = 1;
		$query = mysqli_query($db, "SELECT * FROM pembayaran JOIN zakat ON pembayaran.id_zakat = zakat.id_zakat") or die(mysqli_error($db));
		while ($data = mysqli_fetch_assoc($query)) {
			
		 ?>
			<td><?php echo $no?></td>
			<td><?php echo $data['nama_zakat'];?></td>
			<td>Rp. <?php echo number_format($data['jumlah']);?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['hp'];?></td>
			<td><?php echo $data['email'];?></td>
			<td><?php echo $data['bank'];?></td>
			<td><?php echo $data['no_bank'];?></td>
			<td><a href="edit.php?id=<?php echo $data['id_p']; ?>">Edit</a>
				<a data-toggle="tooltip" data-placement="top" title="Hapus"  href="hapus.php?pages=hapus&id=<?php echo $data['id_p'];?>" onclick="return confirm('Anda yakin ingin menghapus  <?php echo $data['nama']; ?>?');">
                            hapus
                          </a></td>
		</tr>
		<?php 
		$no++;
	}
	?>
	</tbody>
</table><br>
<a href="input.php">Tambah Data</a> 
<a href="pdf.php" target="_BLANK">Cetak PDF</a>
</center>
</body>
</html>