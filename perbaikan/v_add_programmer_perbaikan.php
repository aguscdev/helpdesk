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
            <div class="panel-heading">Tambah Perbaikan</div>
              <div class="panel-body">
                <form method="post" action="action_add_programmer_perbaikan.php">
                  <div class="form-group">
                    <label for="id_user"> Nama Client:</label>
                    <select name="id_user" class="form-control" required="">
                      <option value="">-- Pilih --</option>
                      <?php
                      include '../config/koneksi.php';
                      //$id_is = $_GET['id']; 
                      $query = mysqli_query($koneksi,"SELECT s.*, u.nama
                      FROM tb_issue s
                      JOIN USER u ON s.id_user = u.id
                      LEFT JOIN USER pic ON s.id_programmer = pic.id
                      WHERE s.is_active = 1 AND s.id_programmer= ".$_SESSION['id']."");
                      while ($data=mysqli_fetch_array($query)) { ?>
                      <option value="<?php echo $data['id_user']; ?>"><?php echo $data['nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_aplikasi">Nama Aplikasi:</label>
                    <select name="nama_aplikasi" class="form-control" required="">
                      <option value="">-- Pilih --</option>
                      <?php
                      include '../config/koneksi.php';
                      $query = mysqli_query($koneksi,"SELECT s.*, s.nama_aplikasi
                      FROM tb_issue s
                      JOIN USER u ON s.id_user = u.id
                      LEFT JOIN USER pic ON s.id_programmer = pic.id
                      WHERE s.is_active = 1 AND s.id_programmer= ".$_SESSION['id']."");
                      while ($data=mysqli_fetch_array($query)) { ?>
                      <option value="<?php echo $data['nama_aplikasi']; ?>"><?php echo $data['nama_aplikasi']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_issue"> Issue:</label>
                    <select name="id_issue" class="form-control" required="">
                      <option value="">-- Pilih --</option>
                      <?php
                      include '../config/koneksi.php';
                      $query = mysqli_query($koneksi,"SELECT s.*, s.issue
                      FROM tb_issue s
                      JOIN USER u ON s.id_user = u.id
                      LEFT JOIN USER pic ON s.id_programmer = pic.id
                      WHERE s.is_active = 1 AND s.id_programmer= ".$_SESSION['id']."");
                      while ($data=mysqli_fetch_array($query)) { ?>
                      <option value="<?php echo $data['id']; ?>"><?php echo $data['issue']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="perbaikan">Perbaikan:</label>
                    <input type="text" name="perbaikan" class="form-control" id="perbaikan" required>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <!-- <input type="textare" name="keterangan" class="form-control" id="keterangan" required> -->
                    <textarea class="form-control" id="keterangan" name="keterangan" value="" rows="3" required=""></textarea>
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
                  <a class="btn btn-danger" href="v_programmer_perbaikan.php">Batal</a>
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
  <?php
}
?>