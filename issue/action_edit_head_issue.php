<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
$id_issue = $_POST['id'];
$issue = $_POST['issue'];
$keterangan = $_POST['keterangan'];
$nama_programmer = $_POST['id_programmer'];
$status = $_POST['status'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];

// menginput data ke database
$sql = "UPDATE tb_issue SET issue='$issue',keterangan='$keterangan',id_programmer='$nama_programmer',status='$status',updated_at='$myDate' WHERE id = '$id_issue'";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql)) {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_head_issue.php';
	</script>";
} else {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_head_issue.php';
	</script>";
}

mysqli_close($koneksi);

?>