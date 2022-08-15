<!DOCTYPE html>
<html>
<head>
<title>Latihan PHP</title>
</head>
<body>
	<h3>EDIT DATA</h3>
    <?php
    include 'koneksi.php';
    $nis = $_GET['nis'];
    $data = mysqli_query($koneksi, "select*from latihan where nis='$nis'");
    while ($tampil=mysqli_fetch_array($data)) {
    ?>
    <form method="post" action="update.php">
  	 <table>
  	 	 <tr>
  	 		 <td>Nama</td>
  	 		 <td>
  	 		 	 <input type="hidden" name="nis" value="<?php echo $tampil['nis'];?>">
  	 		 	 <input type="text" name="nama" value="<?php echo $tampil['nama'];?>">
  	 		 </td>
  	 	</tr>
  	 	<tr>
  	 		<td>jk</td>
  	 		<td><input type="text" name="jk" value="<?php echo $tampil['jk'];?>"></td>
  	 	</tr>
  	 	<tr>
  	 		<td>kelas</td>
  	 		<td><input type="text" name="kelas" value="<?php echo $tampil['kelas'];?>"></td>
  	 	</tr>
  	 	<tr>
  	 		<td>alamat</td>
  	 		<td><input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>"></td>
  	 	</tr>
  	 	<tr>
  	 		<td></td>
  	 		<td><input type="submit" value="SIMPAN"></td>
  	 	</tr>
    </table>
</form>
<?php
}
?>
</body>

</html>