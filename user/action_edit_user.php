<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE user SET nama='$nama',username='$username',`password`='$password',`level`='$level',updated_at='$myDate' WHERE `id` = $id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_user.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_user.php';
		</script>";
}

mysqli_close($koneksi);

?>