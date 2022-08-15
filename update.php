<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];

// update data ke database
mysqli_query($koneksi, "update latihan set nama='$nama', jk='$jk', kelas='$kelas', alamat='$alamat' where nis='$nis'");
// mengalihkan halaman kembali ke index.php
header("location:index.php")

?>