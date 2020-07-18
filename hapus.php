<?php
// Panggil koneksi database
require_once "koneksi.php";

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($db, "DELETE FROM pembayaran WHERE id_p='$id'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		echo '<script LANGUAGE="JavaScript">
            alert("Bukti berhasil di hapus")
            window.location.href="buktipembayaran.php";
            </script>'; 
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: buktipembayaran.php');
	}	
}				
						
?>