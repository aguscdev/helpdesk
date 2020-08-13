<?php

// menghubungkan php dengan koneksi database
include '../config/koneksi.php';
session_start();

if ($_SESSION['username']=='') {
	header('location:../login.php');
}else{
	$user = $_SESSION["username"];
	$id_user = $_SESSION["id"];	
	$level = $_SESSION["level"];

	//var_dump($user,$id,$level);
	//die;

	if ($level =='ADMINISTRATOR') {
		header('location:../home/home.php');
	}
	elseif ($level=='PROGRAMMER') {
		header('location:../home/home.php');
	}
	elseif ($level=='CLIENT') {
		header('location:../home/home.php');
	}

}	

?>