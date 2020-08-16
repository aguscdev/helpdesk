<!DOCTYPE html>
<html>
    <!-- cek apakah sudah login -->
<?php
session_start();
if ($_SESSION['username']=='') {
  	header('location:../index.php');
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

		<center><h2>Helpdesk PT.Treemas Solusi Utama</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Laporan Issue dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
                    <th>No Issue</th>
                    <th>Tgl Input</th>
                    <th>Nama Client</th>
                    <th>Nama Aplikasi</th>
                    <th>Issue</th>
                    <th>Keterangan</th>
                    <th>Nama Programmer</th>
                    <th>Status</th>				
				</tr>

				<?php 
				

					// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client, pic.nama AS nama_programmer
                    FROM tb_issue s
                    JOIN USER u ON s.id_user = u.id
                    LEFT JOIN USER pic ON s.id_programmer = pic.id WHERE s.is_active = 1
                    and s.created_at between ('".$dari."') and ('".$sampai."') AND s.id_user = ".$_SESSION['id']." ");
				$no = 1;
					// mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
                        <td>TMS-<?php echo $d['no_issue']; ?></td>
                        <td><?php echo $d['created_at']; ?></td>
                        <td><?php echo $d['nama_client']; ?></td>
                        <td><?php echo $d['nama_aplikasi']; ?></td>
                        <td><?php echo $d['issue']; ?></td>
                        <td><?php echo $d['keterangan']; ?></td>
                        <td><?php echo $d['nama_programmer']; ?></td>
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