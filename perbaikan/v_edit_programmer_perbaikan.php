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
              <div class="panel-heading">Edit Perbaikan</div>
              <div class="panel-body">

               <?php
               include '../config/koneksi.php';
               $id_perbaikan = $_GET['id'];               
               //$data = mysqli_query($koneksi,"SELECT s.*, u.nama AS nama_client FROM tb_issue s JOIN user u ON s.id_user = u.id WHERE s.is_active = 1 AND s.id_user = ".$_SESSION['id']." AND S.id = '$id'");
               $data = mysqli_query($koneksi,"SELECT p.*, i.nama_aplikasi AS nama_aplikasi FROM tb_perbaikan p JOIN tb_issue i ON p.nama_aplikasi = i.nama_aplikasi WHERE p.is_active = 1 AND p.id = '$id_perbaikan'");
               while($d = mysqli_fetch_array($data)){
                 ?>

                 <form method="post" action="action_edit_head_issue.php"> <!-- update.php -->
                   <!-- <div class="form-group">
                     <label for="id">Id</label>
                     <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                     <input type="text" name="id" class="form-control" id="id" value="<?php echo $d['id']; ?>" required disabled="">
                   </div> -->
                   <div class="form-group">
                     <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                   </div>
                   <div class="form-group">
                     <label for="no_perbaikan">No Perbaikan</label>
                     <input type="text" name="no_perbaikan" class="form-control" id="no_issue" value="TMS - <?php echo $d['no_perbaikan']; ?>" required disabled="">
                   </div>
                   <div class="form-group">
                     <label for="nama_aplikasi">Nama Aplikasi</label>
                     <input type="text" name="nama_aplikasi" class="form-control" id="nama_aplikasi" value="<?php echo $d['nama_aplikasi']; ?>" required disabled="">
                   </div>
                   <div class="form-group">
                     <label for="issue">Issue</label>
                     <input type="text" name="issue" class="form-control" id="issue" value="<?php echo $d['issue']; ?>" required disabled="">
                   </div>
                   <div class="form-group">
                     <label for="id_programmer">Nama Programmer</label>
                     <input type="text" name="id_programmer" class="form-control" id="id_programmer" value="<?php echo $d['nama_programmer']; ?>" required disabled="">
                   </div>
                   <div class="form-group">
                     <label for="perbaikan">Perbaikan</label>
                     <input type="text" name="perbaikan" class="form-control" id="perbaikan" value="<?php echo $d['perbaikan']; ?>">
                   </div>
                   <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $d['keterangan']; ?>" required>
                  </div>
                  <?php 
                }
                ?>
                   <!-- <div class="form-group">
                     <label for="nama_programmer">Nama Programmer</label>
                     <input type="text" name="nama_programmer" class="form-control" id="nama_programmer" value="<?php echo $d['nama_programmer']; ?>" required disabled="">
                   </div> -->
                 <div class="form-group">
                  <label for="sel1">Status:</label>
                  <select name="status" class="form-control" id="sel1">
                    <option>-- Pilih --</option>
                    <option>Pending</option>
                    <option>Proses</option>
                    <option>Done</option>
                  </select> 
                </div>
               <!--  <?php
                            include '../config/koneksi.php';
                            $id_issue = $_GET['id']; 
                            $query = mysqli_query($koneksi,"select * from tb_issue where id = '$id_issue'");
                            while ($data=mysqli_fetch_array($query)) { ?>
                   <div class="form-group">
                     <label for="status">Status</label>
                     <input type="text" name="status" class="form-control" id="status" value="<?php echo $data['status']; ?>" required disabled="">
                   </div>
                   <?php } ?> -->
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
   <?php
 }
 ?>