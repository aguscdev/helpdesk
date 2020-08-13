<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$id = $_GET['id'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];


// menginput data ke database
$sql = "UPDATE user SET is_active = 0,updated_at='$myDate' WHERE `id` = $id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_programmer.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_programmer.php';
		</script>";
}

mysqli_close($koneksi);

?>