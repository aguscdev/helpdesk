<?php 
// menghubungkan dengan dompdf
// require_once("../assets/assets/dompdf/dompdf_config.inc.php");
require '../assets/vendor/autoload.php';

// koneksi database
include '../config/koneksi.php';

$html = '<!DOCTYPE html>';
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
$html .= '<th>No Issue</th>';
$html .= '<th>Tgl Input</th>';
$html .= '<th>Nama Client</th>';
$html .= '<th>Nama Aplikasi</th>';
$html .= '<th>Issue</th>';
$html .= '<th>Keterangan</th>';
$html .= '<th>Nama Programme</th>';
$html .= '<th>Status</th>				';
$html .= '</tr>';

				
$data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client, pic.nama AS nama_programmer
	FROM tb_issue s
	JOIN USER u ON s.id_user = u.id
	LEFT JOIN USER pic ON s.id_programmer = pic.id WHERE s.is_active = 1 
	and s.created_at between ('".$dari."') and ('".$sampai."') ORDER BY id desc");
$no = 1;
				
while($d=mysqli_fetch_array($data)){

	$html .= '<tr>';
	$html .= '<td>'.$no++.'</td>';
	$html .= '<td>TMS-'.$d['no_issue'].'</td>';
	$html .= '<td>'.$d['created_at'].'</td>';
	$html .= '<td>'.$d['nama_client'].'</td>';
	$html .= '<td>'.$d['nama_aplikasi'].'</td>';
	$html .= '<td>'.$d['issue'].'</td>';
	$html .= '<td>'.$d['keterangan'].'</td>';
	$html .= '<td>'.$d['nama_programmer'].'</td>';
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
$dompdf->stream('laporan Issue.pdf', array('Attachment'=>0));
?>
