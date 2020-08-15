<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
//$no_issue = $_POST['no_issue'];
$id_use = $_POST['id_user'];
$nama_aplikasi = $_POST['nama_aplikasi'];
$id_is = $_POST['id_issue'];
$id_prog = $_POST['id_programmer'];
$perbaikan = $_POST['perbaikan'];
$keterangan = $_POST['keterangan'];
//$keterangan = $_POST['keterangan'];
//$nama_programmer = $_POST['nama_programmer'];
$status = $_POST['status'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];
$isactive = 1;
//$userID =$_SESSION ['id'];

//generated issue id
$sqlID = "SELECT id FROM tb_perbaikan ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['id'] + 1;
$perbaikanID = date("Ymd");

// menginput data ke database
$sql = "INSERT INTO tb_perbaikan values($myID,'$perbaikanID$myID','$id_use','$nama_aplikasi','$id_is','$id_prog','$perbaikan','$keterangan','$status','$myDate','$myDate',$isactive)";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql))
{
	echo "<script>
	alert('data berhasil disimpan');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
}
else
{
	echo "<script>
	alert('data berhasil disimpan');
	document.location.href = 'v_head_perbaikan.php';
	</script>";
}

mysqli_close($koneksi);
?>