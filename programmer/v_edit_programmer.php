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
              <div class="panel-heading">Edit Programmer</div>
              <div class="panel-body">

               <?php
               include '../config/koneksi.php';
               $id = $_GET['id'];
               $data = mysqli_query($koneksi,"select * from Programmer where id='$id'");
               while($d = mysqli_fetch_array($data)){
                 ?>

                 <form method="post" action="action_edit_programmer.php"> <!-- update.php -->
                   <div class="form-group">
                     <label for="id">Programmer Id</label>
                     <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                     <input type="text" name="id" class="form-control" id="id" value="<?php echo $d['id']; ?>" required disabled="">
                   </div>
                   <div class="form-group">
                     <label for="nama_programmer">Nama Programmer</label>
                     <input type="text" name="nama_programmer" class="form-control" id="nama_programmer" value="<?php echo $d['nama_programmer']; ?>" required>
                   </div>
                   <button type="submit" class="btn btn-info">Simpan</button>
                   <a class="btn btn-danger" href="v_programmer.php">Batal</a>
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