<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
$id_perbaikan = $_POST['id'];
$perbaikan = $_POST['perbaikan'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE tb_perbaikan SET perbaikan='$perbaikan',keterangan='$keterangan',status='$status',updated_at='$myDate' WHERE id = '$id_perbaikan'";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql)) {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_programmer_perbaikan.php';
	</script>";
} else {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_programmer_perbaikan.php';
	</script>";
}

mysqli_close($koneksi);

?>