  <?php 
  error_reporting();
  include "koneksi.php";
  $id = $_GET['id'];
  $query_mysql = mysqli_query($db, "SELECT * FROM pembayaran WHERE id_p='$id'")or die(mysqli_error());
  
  while($data = mysqli_fetch_array($query_mysql)){
      $id = $data['id_p'];
      $jm = $data['jumlah'];
       $nm = $data['nama'];
       $hp =  $data['hp'];
       $mail =  $data['email'];
       $bk =  $data['bank'];
       $nrek =  $data['no_bank'];
        }
      
      ?>
<br>
<br>
<br>
<br>
<br>
<br>
Edit data
<hr>
      <form method="POST">
<table>
  <tr>
    <td>Nama Relawan</td>
    <td>:</td>
    <td><input type="hidden" name="nama" value="<?php echo $id; ?>">
      <input type="text" name="nama" value="<?php echo $nm; ?>"></td>
  </tr>
  <tr>
    <td>Besaran</td>
    <td>:</td>
    <td><input type="text" name="besar" value="<?php echo $jm; ?>"></td>
  </tr>
  <tr>
    <td>Zakat</td>
    <td>:</td>
    <td><select name="zakatnya" >
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
    <td><input type="text" name="email" value="<?php echo $mail; ?>"></td>
  </tr>
  <tr>
    <td>No Hp</td>
    <td>:</td>
    <td><input type="text" name="hp" value="<?php echo $hp; ?>"></td>
  </tr>
  <tr>
    <td>Nama Bank</td>
    <td>:</td>
    <td><input type="text" name="nm_bank" value="<?php echo $bk; ?>"></td>
  </tr>
  <tr>
    <td>No Rekening</td>
    <td>:</td>
    <td><input type="text" name="norek" value="<?php echo $nrek; ?>"></td>
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

  $query = mysqli_query($db, "UPDATE pembayaran SET 
                            id_zakat = '$nm_z',
                            nama       = '$nama',
                            jumlah  = '$besar',
                            hp   = '$hp',
                            email   = '$email',
                            bank       = '$n_bank',
                            no_bank     = '$norek'
                            
                          WHERE id_p    = '$id'");    
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