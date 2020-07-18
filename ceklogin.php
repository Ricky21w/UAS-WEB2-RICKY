<?php 

session_start();
 

include 'koneksi.php';
 

$username = $_POST['username'];
$password = $_POST['password'];
 
$result = mysqli_query($db,"SELECT * FROM user where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['status'] = "sudah_login";
	$_SESSION['id_login'] = $data['id'];
	header("location:buktipembayaran.php");
} else {
	header("location:index.php?pesan=gagal login data tidak ditemukan.");
}
?>