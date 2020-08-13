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
              <div class="panel-heading">Edit Issue</div>
              <div class="panel-body">

               <?php
               include '../config/koneksi.php';
               $id = $_GET['id'];               
               //$data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client FROM tb_issue s JOIN user u ON s.id_user = u.id WHERE s.is_active = 1 AND s.id_user = ".$_SESSION['id']." AND S.id = '$id'");
               $data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client FROM tb_issue s JOIN user u ON s.id_user = u.id WHERE s.is_active = 1 AND s.id_user = ".$_SESSION['id']." AND S.id = '$id'");
               while($d = mysqli_fetch_array($data)){
                 ?>

                 <form method="post" action="action_edit_client_issue.php"> <!-- update.php -->
                   <!-- <div class="form-group">
                     <label for="id">Id</label>
                     <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                     <input type="text" name="id" class="form-control" id="id" value="<?php echo $d['id']; ?>" required disabled="">
                   </div> -->
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
                     <input type="text" name="nama_aplikasi" class="form-control" id="nama_aplikasi" value="<?php echo $d['nama_aplikasi']; ?>" required>
                  </div>
                  <div class="form-group">
                   <label for="issue">Issue</label>
                   <input type="text" name="issue" class="form-control" id="issue" value="<?php echo $d['issue']; ?>" required>
                 </div>
                 <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $d['keterangan']; ?>" required>
                </div>
                   <!-- <div class="form-group">
                     <label for="nama_programmer">Nama Programmer</label>
                     <input type="text" name="nama_programmer" class="form-control" id="nama_programmer" value="<?php echo $d['nama_programmer']; ?>" required disabled="">
                   </div> -->
                   <!-- <div class="form-group">
                     <label for="status">Status</label>
                     <input type="text" name="status" class="form-control" id="status" value="<?php echo $d['status']; ?>" required disabled="">
                   </div> -->
                   <button type="submit" class="btn btn-info">Simpan</button>
                   <a class="btn btn-danger" href="v_client_issue.php">Batal</a>
                 </form>
                 <?php 
               }
               ?>

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