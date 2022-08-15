<?php
session_start();
if(isset($_SESSION['username'])){
	echo "<script>
	alert('Anda Belum Log Out');
	document.location.href='index.php';
	</script>";
}else{
	?>

	<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3>L O G I N</h3>
		<form class="form-group" method="POST">
			<label class="form-label">Username</label>
			<input type="email" class="form-control" placeholder="Masukan email" name="username"></input>
			<label class="form-label">Password</label>
			<input type="Password" class="form-control" placeholder="Masukan Password" name="password"></input>
			<input type="submit" class="btn btn-success" name="simpan" value="Login">
			<input type="reset" class="btn btn-danger" name="batal" value="Reset">
		</form>
		<?php
		include('koneksi.php');
		if(isset($_POST['simpan'])){
			$cek=mysqli_query($koneksi, "select*from login WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
			$hasil=mysqli_fetch_array($cek);
			$count=mysqli_num_rows($cek);
			$nama_latihan=$hasil['username'];
			if($count>0){
				session_start();
				$_SESSION['username']=$nama_latihan;
				header("location:index.php");

			}else{
echo "Gagal Login";
}
}
;?>
</div>
</body>
</html>

<?php }?>