<?php
// koneksi database
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5("admin");
$level = ("PROGRAMMER");
$myDate = date("Y-m-d H:i:s");
//$myUserID = $_SESSION["id"];
$isactive = 1;

//generated user id
$sqlID = "SELECT `id` FROM user ORDER BY `id` DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO user values($myID,'$nama','$username','$password','$level','$myDate','$myDate',$isactive)";
// var_dump($sql);
// 	die;

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