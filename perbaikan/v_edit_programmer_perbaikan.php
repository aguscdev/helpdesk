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
            <div class="panel-heading">Edit Perbaikan</div>
            <div class="panel-body">
              <?php
              include '../config/koneksi.php';
              $id_perbaikan = $_GET['id']; 
              $data = mysqli_query($koneksi,"SELECT p.*, i.issue AS v_issue, pic.nama AS nama_programmer, us.nama as nama_client
                FROM tb_perbaikan p
                JOIN tb_issue i ON p.id_issue = i.id
                LEFT JOIN USER pic ON p.id_programmer = pic.id
                LEFT JOIN USER us ON p.id_user = us.id
                WHERE p.is_active = 1 AND p.id_programmer= ".$_SESSION['id']."");
              while($d = mysqli_fetch_array($data)){ ?>
              <form method="post" action="action_edit_programmer_perbaikan.php"> <!-- update.php -->
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                </div>
                <div class="form-group">
                  <label for="no_perbaikan">No Perbaikan</label>
                  <input type="text" name="no_perbaikan" class="form-control" id="no_issue" value="TMS - <?php echo $d['no_perbaikan']; ?>" required disabled="">
                </div>
                <div class="form-group">
                  <label for="id_user">Nama Client</label>
                  <input type="text" name="id_user" class="form-control" id="id_user" value="<?php echo $d['nama_client']; ?>" required disabled="">
                </div>
                <div class="form-group">
                   <label for="nama_aplikasi">Nama Aplikasi</label>
                   <input type="text" name="nama_aplikasi" class="form-control" id="nama_aplikasi" value="<?php echo $d['nama_aplikasi']; ?>" required disabled="">
                </div>
                <div class="form-group">
                  <label for="id_issue">Issue</label>
                  <input type="text" name="id_issue" class="form-control" id="issue" value="<?php echo $d['v_issue']; ?>" required disabled="">
                </div>
                <div class="form-group">
                  <label for="perbaikan">Perbaikan</label>
                  <input type="text" name="perbaikan" class="form-control" id="perbaikan" value="<?php echo $d['perbaikan']; ?>">
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $d['keterangan']; ?>" required>
                </div>
                <?php } ?>
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
<?php } ?>