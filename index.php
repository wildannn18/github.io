<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>
	alert('Anda Belum Login');
	document.location.href='login.php';
	</script>";
}else{
	?>


<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar Siswa</title>
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<body>
	<h3><a href="logout.php">Logout</a></h3>
	<h2 align="center">Daftar Nama Siswa</h2>
	<table align="center" id="latihan" border="1" class="table-dark table-hover">
		<tr>
			<thead>
			<th>No.</th>
			<th>nis</th>
			<th>nama</th>
			<th>jk</th>
			<th>kelas</th>
			<th>alamat</th>
			
			<th>Aksi</th>
		</thead>
		</tr>
		<?php
		$no=1;
     	$show=mysqli_query($koneksi,"select * from latihan");
     while($tampil=mysqli_fetch_assoc($show)) : ?>
		<tr>
			<td><?= $no;?></td>
			<td><?= $tampil["nis"];?></td>
			<td><?= $tampil["nama"];?></td>
			<td><?= $tampil["jk"];?></td>
			<td><?= $tampil["kelas"];?></td>
			<td><?= $tampil["alamat"];?></td>
			
		<td>| <a href="delete.php?nis=<?php echo $tampil ["nis"]; ?>"onclick="return confirm('yakin?')"class="btn btn-danger">Delete</a>
			<td> | <a href="edit.php?nis=<?php echo $tampil ["nis"]; ?>" class="btn btn-primary">Edit </a>

			</td>
		</tr>
		<?php $no++;?>
		<?php endwhile;?>
	</table>
	<h2>Tambah Data</h2>
	<form method="post" action=""><br>
		<label>nis</label>
        <input type="text" name="nis"><br>
		<label>nama</label>
		<input type="text" name="nama"><br>
		<label>jk</label>
		<input type="text" name="jk"><br>
		<label>kelas</label>
		<input type="text" name="kelas"><br>
		<label>alamat</label>
		<input type="text" name="alamat"><br>
		<button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
		<button type="reset" name="batal" class="btn btn-danger">BATAL</button>
	</form>
</body>
<?php
// Mengambil data yang dikirim dari form
if(isset($_POST['simpan'])){

	$nis=$_POST['nis'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$kelas=$_POST['kelas'];
	$alamat=$_POST['alamat'];

	$query="insert into latihan set nis='$nis',nama='$nama',
	jk='$jk',
		kelas='$kelas',alamat='$alamat'";
	mysqli_query($koneksi,$query);
	if(mysqli_affected_rows($koneksi)>0){

    echo"
    <script>
    alert('Data Berhasil Disimpan');
    document.location.href='index.php';
    </script>
    ";
   }  else {
      echo"
    <script>
    alert('Data gagal Disimpan');
    document.location.href='index.php';
    </script>
    ";
    }
   } 
?>
<script type="text/javascript" src="asset/js/bootstrap.bundle.min.js"></script>
</html>

<?php }?>