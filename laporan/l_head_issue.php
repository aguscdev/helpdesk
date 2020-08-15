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
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../home/sidebar.php'; ?>
        <div class="contents">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="panel panel-default">
                        <div class="panel-heading">Filter Laporan</div>
                        <div class="panel-body">        
                            <form action="l_head_issue.php" method="get">
                                <table id="dtUser" class="table table-bordered">
                                    <tr>                
                                        <th>Dari Tanggal</th>
                                        <th>Sampai Tanggal</th>                         
                                        <th width="1%"></th>
                                    </tr>
                                    <tr>
                                        <td><br/>
                                            <input type="date" name="tgl_dari" class="form-control">
                                        </td>
                                        <td><br/>
                                            <input type="date" name="tgl_sampai" class="form-control"><br/>
                                        </td>
                                        <td><br/>
                                            <input type="submit" class="btn btn-primary" value="Filter">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div><br/>
                    <?php 
                    if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
                    // $dari = $_GET['tgl_dari'];
                    // $sampai = $_GET['tgl_sampai'];
                    $dari=date($_GET["tgl_dari"]);
                    $sampai=date($_GET["tgl_sampai"]);
                    ?>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4>Laporan Issue dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
                        </div>
                        <div class="panel-body">            
                            <a target="_blank" href="head_cetak_print_issue.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
                            <a target="_blank" href="head_cetak_pdf_issue.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK PDF</a>
                            <br/>
                            <br/>
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
                                include '../config/koneksi.php';
                                $data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client, pic.nama AS nama_programmer
                                    FROM tb_issue s
                                    JOIN USER u ON s.id_user = u.id
                                    LEFT JOIN USER pic ON s.id_programmer = pic.id WHERE s.is_active = 1 
                                    and s.created_at between ('".$dari."') and ('".$sampai."') ORDER BY id desc");
                                $no = 1;
                                
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
                                <?php } ?>                          
                            </table>
                        </div>
                    </div>
                </section><br>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
<?php include '../home/footer.php'; ?>
</html>
<?php } ?>