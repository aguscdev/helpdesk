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
          <div class="panel-heading">Tambah Issue</div>
          <div class="panel-body">
            <form method="post" action="action_add_head_issue.php">
              <div class="form-group">
                <label for="nama_aplikasi">Nama Aplikasi:</label>
                <input type="text" name="nama_aplikasi" class="form-control" id="nama_aplikasi" required>
              </div>
              <div class="form-group">
                <label for="issue">Issue:</label>
                <input type="text" name="issue" class="form-control" id="issue" required>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <!-- <input type="textare" name="keterangan" class="form-control" id="keterangan" required> -->
                <textarea class="form-control" id="keterangan" name="keterangan" value="" rows="3" required=""></textarea>
              </div>
                 <div class="form-group">
                    <label for="nama_programmer"> Nama Programmer:</label>
                    <select name="nama_programmer" class="form-control" required="">
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