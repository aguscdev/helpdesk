<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
//$no_issue = $_POST['no_issue'];
//$nama_client = $_POST['nama_client'];
$nama_aplikasi = $_POST['nama_aplikasi'];
$issue = $_POST['issue'];
$keterangan = $_POST['keterangan'];
$nama_programmer = $_POST['nama_programmer'];
$status = $_POST['status'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];
$isactive = 1;
$userID =$_SESSION ['id'];

//generated issue id
$sqlID = "SELECT id FROM tb_issue ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['id'] + 1;
$issueID = date("Ymd");

// menginput data ke database
$sql = "INSERT INTO tb_issue values($myID,'$issueID$myID','$userID','$nama_aplikasi','$issue','$keterangan','$nama_programmer','$status','$myDate','$myDate',$isactive)";
// var_dump($sql);
// die;
if (mysqli_query($koneksi, $sql))
{
	echo "<script>
	alert('data berhasil disimpan');
	document.location.href = 'v_head_issue.php';
	</script>";
}
else
{
	echo "<script>
	alert('data berhasil disimpan');
	document.location.href = 'v_head_issue.php';
	</script>";
}

mysqli_close($koneksi);
?>