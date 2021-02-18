<!DOCTYPE html>
<html>
<?php
if ($this->session->userdata('userlogin'))     // mencegah akses langsung tanpa login
{
    $users = $this->session->userdata('userlogin');
    // $fullname = $this->session->userdata('user_nama');
} else {
    //masuk tanpa login
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Mohon Login terlebih dahulu</div>");
    redirect(base_url() . 'Login');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $tittle; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
        rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="<?php echo base_url() ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link
        href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= base_url('Admin') ?>">ADMIN - MONKES</a>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url() ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $this->session->userdata('userlogin'); ?></div>
                    <!-- <div class="email">Admin</div> -->

                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php if ($this->session->userdata('level') == 10) { ?>
                    <li class="active">
                        <a href="<?= base_url('Admin') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Karyawan') ?>">
                            <i class="material-icons">assignment_ind</i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Monitor/sakit') ?>">
                            <i class="material-icons">swap_calls</i>
                            <span>Monitoring Karyawan</span>
                        </a>
                    </li>

                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 2) { ?>
                    <li>
                        <a href="<?= base_url('Admin') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <?php } ?>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url('Report/perkaryawan') ?>">Karyawan Covid19</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Report') ?>">Karyawan Non Covid19</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Report/suhu') ?>">Suhu karyawan</a>
                            </li>

                        </ul>
                    </li>
                    <?php if ($this->session->userdata('level') == 10) { ?>
                    <li>
                        <a href="<?= base_url('Tracking') ?>">
                            <i class="material-icons">import_export</i>
                            <span>Tracking</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('User') ?>">
                            <i class="material-icons">account_circle</i>
                            <span>User Pengguna</span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if ($this->session->userdata('level') == 2) { ?>
                    <li>
                        <a href="<?= base_url('Home') ?>">
                            <i class="material-icons">settings_backup_restore</i>
                            <span>Kembali</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('Login/logout') ?>">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">MIS@2021 MSAL GROUP</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>


    </section>

    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"
        integrity="sha512-LXVbtSLdKM9Rpog8WtfAbD3Wks1NSDE7tMwOW3XbQTPQnaTrpIot0rzzekOslA1DVbXSVzS7c/lWZHRGkn3Xpg=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    </script>


    <section class="content">
        <?php echo $contents ?>
    </section>
    <!-- Jquery Core Js -->

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url() ?>assets/js/pages/ui/modals.js"></script>


    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script> -->

    <!-- Demo Js -->
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/dropzone/dropzone.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script
        src="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>

    <!-- Ckeditor -->
    <script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>


</body>

</html>