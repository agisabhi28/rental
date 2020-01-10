<?php
include '../koneksi.php';
$nama_pelanggan = $_POST['nama_pelanggan'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$email   = $_POST['email'];
$password	= $_POST['password'];
$password1  = $_POST['password1'];

if ($_POST['submit']) {
  $ekstensi_boleh = array('png','jpg');
  $foto_ktp       = $_FILES['foto_ktp'];
  $x              = explode('.',$foto_ktp);
  $ekstensi       = strtolower(end($x));
  $ukuran         = $_FILES['foto_ktp']['size'];
  $file_tmp       = $_FILES['foto_ktp']['tmp_name'];
  if($password==$password1){


  if (in_array($ekstensi, $ekstensi_boleh) === true) {
    if ($ukuran < 1044070) {
      move_upload_file($file_tmp, 'ktp/'.$foto_ktp);
      $query = mysqli_query($koneksi, "insert into pelanggan values ('','$nama_pelanggan','$pekerjaan','$alamat','$nik','$foto_ktp','$email','$password')")or die(mysqli_error());

    }else {
      echo "<script> alert('Ukuran File Max : 1 MB'); </script>";
      include 'daftaruser.php';
    }

  }else {
    echo "<script> alert('Ekstensi harus JPG atau PNG');</script>";
    include 'daftaruser.php';
  }

}else {
  echo "<script> alert('belum Klik Submit'); </script>";
  include 'daftaruser.php';
}
}





?>
