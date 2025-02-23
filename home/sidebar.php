<?php 
    if ($_SESSION['username']=='') {
        header('location:../index.php');
    }
    $user = $_SESSION["username"];
    $id_user = $_SESSION["id"];  
    $level = $_SESSION["level"];
?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Menu Utama</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../assets/img/no-avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php 
                    echo $_SESSION["username"];
                    ?>
                </p>
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
        <br>
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="">
                <a href="../home/home.php">
                    <i class="fa fa-university text-aqua"></i> <span>Home</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <?php if ($level == 'ADMINISTRATOR'){ ?>
                <li class="">
                    <a href="../issue/v_head_issue.php">
                        <i class="fa fa-list text-aqua"></i><span>ISSUE</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'ADMINISTRATOR'){ ?>
                <li class="">
                    <a href="../perbaikan/v_head_perbaikan.php">
                        <i class="fa fa-list text-aqua"></i><span>PERBAIKAN</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'ADMINISTRATOR'){ ?>
                <li>
                    <a href="#avseg" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>LAPORAN</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="avseg" class="collapse ">
                        <ul class="nav">
                            <li><a href="../laporan/l_head_issue.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp Laporan Issue</a></li>
                            <li><a href="../laporan/l_head_perbaikan.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp Laporan Perbaikan</a></li>
                        </ul>
                    </div>
                </li>
            <?php } ?>
            <?php if ($level == 'PROGRAMMER'){ ?>
                <li class="">
                    <a href="../issue/v_programmer_issue.php">
                        <i class="fa fa-list text-aqua"></i><span>ISSUE</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'PROGRAMMER'){ ?>
                <li class="">
                    <a href="../perbaikan/v_programmer_perbaikan.php">
                        <i class="fa fa-list text-aqua"></i><span>PERBAIKAN</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'CLIENT'){ ?>
                <li class="">
                    <a href="../issue/v_client_issue.php">
                        <i class="fa fa-list text-aqua"></i><span>ISSUE</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'CLIENT'){ ?>
                <li>
                    <a href="#avseg" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>LAPORAN</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="avseg" class="collapse ">
                        <ul class="nav">
                            <li><a href="../laporan/l_client_issue.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp Laporan Issue</a></li>
                            <li><a href="../laporan/l_client_perbaikan.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp Laporan Perbaikan</a></li>
                        </ul>
                    </div>
                </li>
            <?php } ?>
            <?php if ($level == 'ADMINISTRATOR'){ ?>
                <li class="">
                    <a href="../programmer/v_programmer.php">
                        <i class="fa fa-user-o text-aqua"></i><span>Programmer</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($level == 'ADMINISTRATOR'){ ?>
                <li class="">
                    <a href="../user/v_user.php">
                        <i class="fa fa-user-o text-aqua"></i><span>User</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            <?php } ?>
            <li class="">
                <a href="../admin/v_ganti_password.php">
                    <i class="fa fa fa-cog text-aqua"></i><span>Ganti Password</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="../admin/logout.php">
                    <i class="fa fa-power-off text-red"></i><span>Logout</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>