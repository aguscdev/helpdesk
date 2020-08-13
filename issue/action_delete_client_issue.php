<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$id_issue = $_GET['id'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE tb_issue SET is_active = 0,updated_at='$myDate' WHERE id = $id_issue";
if (mysqli_query($koneksi, $sql)){
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'v_client_issue.php';
	</script>";
}else{
	echo "<script>
	alert('data berhasil dihapus');
	document.location.href = 'v_client_issue.php';
	</script>";
}

mysqli_close($koneksi);

?>