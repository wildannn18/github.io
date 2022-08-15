<?php
include ("koneksi.php");
$nis=$_GET['nis'];
mysqli_query($koneksi,"delete from latihan where nis='$nis'");
echo"
<script>
alert('Data Berhasil Dihapus');
document.location.href='index.php';
</script>
";
;?>