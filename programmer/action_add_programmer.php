<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$nama_programmer = $_POST['nama_programmer'];
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];
$isactive = 1;

//generated programmer id
$sqlID = "SELECT id FROM programmer ORDER BY id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO programmer values($myID,'$nama_programmer','$myDate','$myDate',$isactive)";
//var_dump($sql);
//die;
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_programmer.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_programmer.php';
		</script>";
}

mysqli_close($koneksi);
?>