<?php
session_start(); 
// menghubungkan php dengan koneksi database
include '../config/koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select id,nama,username,level,created_at,updated_at, is_active from user where username='$username' and password='$password'");

/*var_dump($login);
	exit;*/
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	// buat session login dan username
	$_SESSION["nama"] = $data['nama'];
	$_SESSION["username"] = $data['username'];
	$_SESSION["id"] = $data['id'];
	$_SESSION["level"] = $data['level'];
	$_SESSION["created_at"] = $data['created_at'];
	$_SESSION["updated_at"] = $data['updated_at'];
	$_SESSION["is_active"] = $data['is_active'];

	//var_dump($_SESSION["username"],$_SESSION["id"],$_SESSION["level"]);
	//exit;

	// echo $_SESSION["user_id"];
	// alihkan ke halaman dashboard admin
	header("location:cek_session.php");
}else{
	echo "<script>
				alert('Username / Password yang anda masukan salah');
				document.location.href = '../index.php';
		</script>";
}
 
?>