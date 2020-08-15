<!DOCTYPE html>
<html>
    <!-- cek apakah sudah login -->
<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../admin/login.php');

  
}else{

  $user = $_SESSION["username"];
  $id_user = $_SESSION["id"];   
  $level = $_SESSION["level"];

   include '../home/header.php'; 

?>
<body>
<?php 
	include '../config/koneksi.php';
	?>
	<div class="container">

		<center><h2>Helpdesk PT. Treemas Solusi Utama</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Laporan Perbaikan dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
                    <th>No Perbaikan</th>
                    <th>Tgl Input</th>
                    <th>Nama Client</th>
                    <th>Nama Aplikasi</th>
                    <th>Issue</th>
                    <th>Nama Programmer</th>
                    <th>Perbaikan</th>
                    <th>Keterangan</th>
                    <th>Status</th>				
				</tr>

				<?php 
				

					// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"SELECT p.*, i.issue AS v_issue, pic.nama AS nama_programmer, us.nama as nama_client
                    FROM tb_perbaikan p
                    JOIN tb_issue i ON p.id_issue = i.id
                    LEFT JOIN USER pic ON p.id_programmer = pic.id
                    LEFT JOIN user us ON p.id_user = us.id
                    WHERE p.is_active = 1 and p.created_at between ('".$dari."') and ('".$sampai."') AND p.id_user = ".$_SESSION['id']."");
				$no = 1;
					// mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
                        <td>TMS-<?php echo $d['no_perbaikan']; ?></td>
                        <td><?php echo $d['created_at']; ?></td>
                        <td><?php echo $d['nama_client']; ?></td>
                        <td><?php echo $d['nama_aplikasi']; ?></td>
                        <td><?php echo $d['v_issue']; ?></td>
                        <td><?php echo $d['nama_programmer']; ?></td>
                        <td><?php echo $d['perbaikan']; ?></td>
                        <td><?php echo $d['keterangan']; ?></td>
                        <!-- <td><?php echo $d['status']; ?></td> -->
                        <!-- <td><?php echo $d['transaksi_tgl_selesai']; ?></td> -->
                        <!-- <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td> -->
                        <td>
                            <?php 
                            if($d['status']=="Pending"){
                                echo "<div class='label label-warning'>Pending</div>";
                            }else if($d['status']=="Proses"){
                                echo "<div class='label label-info'>Proses</div>";
                            }else if($d['status']=="Done"){
                                echo "<div class='label label-success'>Done</div>";
                            }
                            ?>                          
                        </td>								
					</tr>
					<?php 
				}
				?>
			</table>			
			<?php } ?>

		</div>

		<script type="text/javascript">
			window.print();
		</script>

	</body>
	<?php include '../home/footer.php'; ?>
	</html>
	<?php } ?>