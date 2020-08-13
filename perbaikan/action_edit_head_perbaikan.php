<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// var_dump($_POST);
// die;

// menangkap data yang di kirim dari form
$id_perbaikan = $_POST['id'];
//$no_issue = $_POST['no_issue'];
//$nama_client = $_POST['nama_client'];
//$nama_aplikasi = $_POST['nama_aplikasi'];
//$issue = $_POST['id_issue'];
$id_programmer = $_POST['id_programmer'];
$perbaikan = $_POST['perbaikan'];
$keterangan = $_POST['keterangan'];

$status = $_POST['status'];
//$nama_programmer = $_POST['nama_programmer'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE tb_perbaikan SET id_programmer='$id_programmer',perbaikan='$perbaikan',keterangan='$keterangan',status='$status',updated_at='$myDate' WHERE id = '$id_perbaikan'";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql)) {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
} else {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
}

mysqli_close($koneksi);

?>