<!DOCTYPE html>
<html>
<?php
session_start();
if ($_SESSION['username']=='') 
{
  header('location:../admin/login.php');

}
  else{

  $user = $_SESSION["username"];
  $id_user = $_SESSION["id"];  
  $level = $_SESSION["level"];

include '../home/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include '../home/sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome <?php echo $_SESSION["nama"]; ?>
          </h1>
          <br><br>
          <div class="panel panel-default">
              <div class="panel-body">
                  <img alt="logo" src="../assets/img/treemas.png" height="70">
                  <br><br>
                  <p><h3>Helpdesk PT Treemas Solusi Utama</h3></p>
                  <p>
                      <button type="button" class="btn btn-default btn-lg">
                          <span class="glyphicon glyphicon-home"></span> Graha Raya Bintaro Jaya N1/19 Serpong, Tangerang 15324
                      </button>
                  </p>
                  <p>
                      <button type="button" class="btn btn-default btn-lg">
                          <span class="glyphicon glyphicon-envelope"></span> info@treemas.com 
                      </button>
                  </p>
                  <p>
                      <button type="button" class="btn btn-default btn-lg">
                          <span class="glyphicon glyphicon-earphone"></span> (62) 021 5312 6251
                      </button>
                  </p>
                  <br/><br/>
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