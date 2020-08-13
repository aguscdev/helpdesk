<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama_programmer = $_POST['nama_programmer'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE programmer SET nama_programmer='$nama_programmer',updated_at='$myDate' WHERE id = $id";
if (mysqli_query($koneksi, $sql)){
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_programmer.php';
	</script>";
}else{
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_programmer.php';
	</script>";
}

mysqli_close($koneksi);

?>