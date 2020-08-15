<!DOCTYPE html>
<html>

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
                <div class="panel-heading">Master User</div>
                <div class="panel-body">
                <!-- <a class="btn btn-success" href="../Programmer/v_add_programmer.php">Tambah</a><br/><br/> -->
                    <table id="dtUser" class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Nama Programmer</th>
                            <!-- <th>Username</th> -->
                            <!-- <th>Hak Akses</th> -->
                            <!-- <th>Aksi</th> -->
                        </thead>
                        <tbody>
                            <?php
                                include '../config/koneksi.php';
                                $data = mysqli_query($koneksi,"select * from user where is_active = 1 and level = 'PROGRAMMER'");
                                $no = 1;
                                while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no ++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <!-- <td><?php echo $d['username']; ?></td> -->
                                <!-- <td><?php echo $d['level']; ?></td> -->
                               <!--  <td>
                                    <a href="v_edit_programmer.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a> ||
                                    <a href="action_delete_programmer.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
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