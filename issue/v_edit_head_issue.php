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
              <div class="panel-heading">Edit Issue</div>
              <div class="panel-body">
                <?php
                include '../config/koneksi.php';
                $id_issue = $_GET['id'];
                $data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client FROM tb_issue s JOIN user u ON s.id_user = u.id WHERE s.is_active = 1 AND S.id = '$id_issue'");
                while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post" action="action_edit_head_issue.php"> <!-- update.php -->
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                  </div>
                  <div class="form-group">
                    <label for="no_issue">No Issue</label>
                    <input type="text" name="no_issue" class="form-control" id="no_issue" value="TMS - <?php echo $d['no_issue']; ?>" required disabled="">
                  </div>
                  <div class="form-group">
                    <label for="nama_client">Nama Client</label>
                    <input type="text" name="nama_client" class="form-control" id="nama_client" value="<?php echo $d['nama_client']; ?>" required disabled="">
                  </div>
                  <div class="form-group">
                    <label for="nama_aplikasi">Nama Aplikasi</label>
                    <input type="text" name="nama_aplikasi" class="form-control" id="nama_aplikasi" value="<?php echo $d['nama_aplikasi']; ?>" required disabled="">
                  </div>
                  <div class="form-group">
                    <label for="issue">Issue</label>
                    <input type="text" name="issue" class="form-control" id="issue" value="<?php echo $d['issue']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $d['keterangan']; ?>" required>
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <label for="id_programmer"> Nama Programmer:</label>
                    <select name="id_programmer" class="form-control" required="">
                      <option value="">-- Pilih --</option>
                      <?php
                      include '../config/koneksi.php';
                      $id_is = $_GET['id']; 
                      $query = mysqli_query($koneksi,"select * from user where level = 'Programmer' ");
                      while ($data=mysqli_fetch_array($query)) { ?>
                      <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sel1">Status:</label>
                    <select name="status" class="form-control" id="sel1">
                      <option>-- Pilih --</option>
                      <option>Pending</option>
                      <option>Proses</option>
                      <option>Done</option>
                    </select> 
                  </div>
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a class="btn btn-danger" href="v_head_issue.php">Batal</a>
                </form>
              </div>
            </div>
          </section><br>
        </div>
      </div>
    </div>
  </body>
  <?php include '../home/footer.php'; ?>
</html>
<?php } ?>