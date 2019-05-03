<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kartikasari</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">


    <!-- Modernizr JS -->
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<script type="text/javascript">
function myFunction() {
  alert("Harus Login Terlebih dahulu");
}
</script>
<?php
    $message = $this->session->flashdata('message');
    //   echo "$message";
    if ($message == "error") {
        ?>
    <script type="text/javascript">
      alert("Username atau Password Salah");
    </script>
    <?php
        };
        ?>
    <?php
            $message = $this->session->flashdata('message');
            if ($message == "success") {
                ?>
    <script type="text/javascript">
        alert("Akun berhasil dibuat");
    </script>
    <?php
        };
        ?>
    <?php
        $message = $this->session->flashdata('message');
        //   echo "$message";
        if ($message == "error_not_match") {
            ?>
    <script type="text/javascript">
    alert("Konfirmasi Email or Password doesnt match");
    </script>
    <?php
            };
            ?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form class="login-form" role="form" method="POST" action="<?php echo base_url() ?>Login/masuk">
                        <div class="form-group">
                            <input id="username" type="text" class="form-control" placeholder="Username" name="username"
                                value="" required autofocus>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control" placeholder="Password"
                                name="password" autocomplete="off" required>
                        </div>
                        <div class="form-group center">
                            <div class="row">
                                <div class="col-md-2">
                                  <div class="send__btn">
                                      <button type="submit" class="btn btn-default" >Login</button>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="send__btn">
                                      <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">Daftar</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form class="daftar-form" role="form" method="POST" action="<?php echo base_url() ?>Daftar/tambah">
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama" name="nama"
                  value="" required autofocus>
          </div>
          <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email"
                  value="" required autofocus>
          </div>
          <div class="form-group">
              <input type="email" class="form-control" placeholder="Ketik ulang Email" name="email2"
                  value="" required autofocus>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                  value="" required autofocus>
          </div>
          <div class="form-group">
              <input  type="text" class="form-control" placeholder="No. Telp" name="telp"
                  value="" required autofocus>
          </div>
                        <div class="form-group">
                            <input  type="text" class="form-control" placeholder="Username" name="username"
                                value="" required autofocus>
                        </div>
                        <div class="form-group">
                            <input  type="password" class="form-control" placeholder="Password"
                                name="password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <input  type="password" class="form-control" placeholder="Ketik ulang Password"
                                name="password2" autocomplete="off" required>
                        </div>
                        <div class="form-group center">
                            <div class="row">
                                <div class="col-md-2">
                                  <div class="send__btn">
                                      <button type="submit" class="btn btn-default" >Daftar</button>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>
<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
      <header id="htc__header" class="htc__header__area header--one">
                  <!-- Start Mainmenu Area -->
                  <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                      <div class="container">
                          <div class="row">
                              <div class="menumenu__container clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                      <div class="logo">
                                           <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo/4.png" alt="logo images"></a>
                                      </div>
                                  </div>
                                  <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                      <nav class="main__menu__nav hidden-xs hidden-sm">
                                          <ul class="main__menu">
                                              <li class="drop"><a href="<?php echo base_url() ?>">Home</a></li>
                                              <li class="drop"><a href="<?php echo base_url() ?>produk/produklist">Shop</a>
                                          </ul>
                                      </nav>

                                      <div class="mobile-menu clearfix visible-xs visible-sm">
                                          <nav id="mobile_dropdown">
                                              <ul>
                                                  <li><a href="<?php echo base_url() ?>">Home</a></li>
                                                  <li><a href="<?php echo base_url() ?>produk/produklist">Shop</a></li>
                                              </ul>
                                          </nav>
                                      </div>
                                  </div>
                                  <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                      <div class="header__right">
                                          <div class="header__search search search__open">
                                              <a href="#"><i class="icon-magnifier icons"></i></a>
                                          </div>
                                          <?php
                                          if ($this->session->userdata('status') != "login") {
                                          ?>
                                          <div class="header__account">
                                              <a href="" class="showPopup" data-toggle="modal" data-target="#myModal"><i class="icon-user icons"></i></a>
                                          </div>
                                          <?php
                                        }else { ?>
                                          <div class="">
                                              <a href="<?php echo base_url() ?>Login/logout" ><span>Log Out</span></a>
                                          </div>
                                          <div class="header__account">
                                            <span> &nbsp;&nbsp;&nbsp; </span>
                                          </div>
                                        <?php } ?>
                                          <div class="htc__shopping__cart">
                                              <a href="<?= base_url() ?>cart/cart_detail/<?= $this->session->userdata('id') ?>"><i class="icon-handbag icons"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="mobile-menu-area"></div>
                      </div>
                  </div>
                  <!-- End Mainmenu Area -->
              </header>
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->

        </div>
