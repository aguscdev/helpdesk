<?php 

// menghubungkan dengan dompdf
// require_once("../assets/assets/dompdf/dompdf_config.inc.php");
require '../assets/vendor/autoload.php';

// koneksi database
include '../config/koneksi.php';

$html = '<!DOCTYPE html>';
session_start();
$user = $_SESSION["username"];
$id_user = $_SESSION["id"];  
$level = $_SESSION["level"];
$html .= '<html>';
$html .= '<head>';
$html .='	<title>Helpdesk PT.Treemas Solusi Utama</title>';
$html .= '</head>';
$html .= '<body>';
$html .= '<center><h2>Helpdesk PT.Treemas Solusi Utama</h2></center>';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];


$html .= '<h4>Laporan Issue dari <b>'.$dari.'</b> sampai <b>'.$sampai.'</b></h4>';
$html .= '<table border="1" width="100%">';
$html .= '<tr>';
$html .= '<th width="1%">No</th>';
$html .= '<th>No Perbaikan</th>';
$html .= '<th>Tgl Input</th>';
$html .= '<th>Nama Client</th>';
$html .= '<th>Nama Aplikasi</th>';
$html .= '<th>Issue</th>';
$html .= '<th>Keterangan</th>';
$html .= '<th>Nama Programmer</th>';
$html .= '<th>Perbaikan</th>';
$html .= '<th>Keterangan</th>';
$html .= '<th>Status</th>				';
$html .= '</tr>';

				
$data = mysqli_query($koneksi,"SELECT p.*, i.issue AS v_issue, pic.nama AS nama_programmer, us.nama as nama_client
    FROM tb_perbaikan p
    JOIN tb_issue i ON p.id_issue = i.id
    LEFT JOIN USER pic ON p.id_programmer = pic.id
    LEFT JOIN user us ON p.id_user = us.id
    WHERE p.is_active = 1 and p.created_at between ('".$dari."') and ('".$sampai."') AND p.id_user = ".$_SESSION['id']."");
$no = 1;
				
while($d=mysqli_fetch_array($data)){

	$html .= '<tr>';
	$html .= '<td>'.$no++.'</td>';
	$html .= '<td>TMS-'.$d['no_perbaikan'].'</td>';
	$html .= '<td>'.$d['created_at'].'</td>';
	$html .= '<td>'.$d['nama_client'].'</td>';
	$html .= '<td>'.$d['nama_aplikasi'].'</td>';
	$html .= '<td>'.$d['v_issue'].'</td>';
	$html .= '<td>'.$d['keterangan'].'</td>';
	$html .= '<td>'.$d['nama_programmer'].'</td>';
	$html .= '<td>'.$d['perbaikan'].'</td>';
	$html .= '<td>'.$d['keterangan'].'</td>';
	$html .= '<td>';

	if($d['status']=="Pending"){
		$html .= "Pending";
	}else if($d['status']=="Proses"){
		$html .= "Proses";
	}else if($d['status']=="Done"){
		$html .= "Done";
	}

	$html .= '</td>';
	$html .= '</tr>';


}

$html .= '</table>';
$html .= '</body>';
$html .= '</html>';


use Dompdf\Dompdf;
$dompdf = new Dompdf();		
$dompdf->set_paper('a4','landscape');
$dompdf->load_html($html);
$dompdf->render();
// $dompdf->stream('laporan_dari'.$dari.'_sampai_'.$sampai.'.pdf');
$dompdf->stream('laporan perbaikan.pdf', array('Attachment'=>0));
?>