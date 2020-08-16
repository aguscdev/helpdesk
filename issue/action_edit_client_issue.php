<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
$id_issue = $_POST['id'];
$nama_aplikasi = $_POST['nama_aplikasi'];
$issue = $_POST['issue'];
$keterangan = $_POST['keterangan'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE tb_issue SET nama_aplikasi='$nama_aplikasi',issue='$issue',keterangan='$keterangan',updated_at='$myDate' WHERE id = '$id_issue'";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql)) {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_client_issue.php';
	</script>";
} else {
	echo "<script>
	alert('data berhasil diupdate');
	document.location.href = 'v_client_issue.php';
	</script>";
}

mysqli_close($koneksi);

?>