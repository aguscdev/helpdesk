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
                    <div class="panel-heading">Master Issue</div>
                    <div class="panel-body">
                        <!-- <a class="btn btn-success" href="../issue/v_add_programmer_issue.php">Tambah</a><br/><br/> -->
                        <table id="dtUser" class="table table-bordered">
                            <thead>
                                <!-- <th>Issue Id</th> -->
                                <th>No Issue</th>
                                <th>Nama Client</th>
                                <th>Nama Aplikasi</th>
                                <th>Issue</th>
                                <th>Keterangan</th>
                                <!-- <th>Nama Programmer</th> -->
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </thead>
                            <tbody>
                                <?php
                                include '../config/koneksi.php';
                                $data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client, pic.nama AS nama_programmer
                                    FROM tb_issue s
                                    JOIN USER u ON s.id_user = u.id
                                    LEFT JOIN USER pic ON s.id_programmer = pic.id
                                    WHERE s.is_active = 1 AND s.id_programmer= ".$_SESSION['id']."");
                                $no = 1;
                                while($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <!--  <td height="10"><?php echo $no ++; ?></td> -->
                                        <th>TMS - <?php echo $d['no_issue']; ?></th>
                                        <th><?php echo $d['nama_client']; ?></th>
                                        <th><?php echo $d['nama_aplikasi']; ?></th>
                                        <th><?php echo $d['issue']; ?></th>
                                        <th><?php echo $d['keterangan']; ?></th>
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
                                        <!-- <td>
                                            <a href="v_edit_programmer_issue.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a> ||
                                            <a href="action_delete_programmer_issue.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
                                            <a href="action_detail_programmer_issue.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Detail</a>
                                        </td> -->
                                    </tr>
                                    <?php
                                };
                                ?>
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