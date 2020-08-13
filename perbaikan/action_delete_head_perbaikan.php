<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$id_perbaikan = $_GET['id'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE tb_perbaikan SET is_active = 0,updated_at='$myDate' WHERE id = $id_perbaikan";
if (mysqli_query($koneksi, $sql)){
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
}else{
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
}

mysqli_close($koneksi);

?>