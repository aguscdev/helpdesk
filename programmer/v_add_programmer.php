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
            <div class="panel-heading">Tambah Programmer</div>
            <div class="panel-body">
              <form method="post" action="action_add_programmer.php">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                  <label for="usr">Username:</label>
                  <input type="text" name="username" class="form-control" id="usrname" required>
                </div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a class="btn btn-danger" href="v_programmer.php">Batal</a>
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