<!DOCTYPE html>
<html>

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
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../home/sidebar.php'; ?>
        <div class="contents">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="panel panel-default">
                        <div class="panel-heading">Master Perbaikan</div>
                        <div class="panel-body">
                            <a class="btn btn-success" href="../perbaikan/v_add_head_perbaikan.php">Tambah</a><br/><br/>
                            <table id="dtUser" class="table table-bordered">
                                <thead>
                                    <!-- <th>Issue Id</th> -->
                                    <th>No Perbaikan</th>
                                    <th>Nama Client</th>
                                    <th>Nama Aplikasi</th>
                                    <th>Issue</th>
                                    <th>Nama Programmer</th>
                                    <th>Perbaikan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                            <tbody>
                                <?php
                                include '../config/koneksi.php';
                                $data = mysqli_query($koneksi,"SELECT p.*, i.issue AS v_issue, pic.nama AS nama_programmer, us.nama as nama_client
                                FROM tb_perbaikan p
                                JOIN tb_issue i ON p.id_issue = i.id
                                LEFT JOIN USER pic ON p.id_programmer = pic.id
                                LEFT JOIN USER us ON p.id_user = us.id
                                WHERE p.is_active = 1");
                                 // AND p.id_programmer= ".$_SESSION['id']."
                                //$no = 1;
                                while($d = mysqli_fetch_array($data)) {
                                ?>
                                <tr>
                                    <!--  <td height="10"><?php echo $no ++; ?></td> -->
                                    <td>TMS - <?php echo $d['no_perbaikan']; ?></td>
                                    <td><?php echo $d['nama_client']; ?></td>
                                    <td><?php echo $d['nama_aplikasi']; ?></td>
                                    <td><?php echo $d['v_issue']; ?></td>
                                    <td><?php echo $d['nama_programmer']; ?></td>
                                    <td><?php echo $d['perbaikan']; ?></td>
                                    <td><?php echo $d['keterangan']; ?></td>
                                    <!-- <th  class="text-center"><?php echo $d['nama_programmer']; ?></th> -->
                                    <!-- <th><?php echo $d['status']; ?></th> -->
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
                                    <td>
                                        <a href="v_edit_head_perbaikan.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a> ||
                                        <a href="action_delete_head_perbaikan.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
                                        <!-- <a href="action_detail_programmer_issue.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Detail</a> -->
                                    </td>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section><br>
        </div>
    </div>
</div>
</body>
<?php include '../home/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dtUser').DataTable();
    });
</script>
</html>
<?php
}
?>