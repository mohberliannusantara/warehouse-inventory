<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png') ?>">
  <title>
    Sistem Monitoring Aset | PT. PLN Persero
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, Pengguna-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url('') ?>assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('') ?>assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>
<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="<?php echo base_url('assets/img/sidebar-3.jpg'); ?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <img src="<?php echo base_url('assets/img/favicon.png') ?>" alt="" style="width:100%;">
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          PT. PLN (Persero)
        </a>
      </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item <?php if ($page == 'Beranda'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/beranda') ?>">
            <i class="material-icons">dashboard</i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Extracomptable'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/barang')?>">
            <i class="material-icons">inventory</i>
            <p>Extracomptable</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Kendaraan'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/kendaraan')?>">
            <i class="material-icons">local_shipping</i>
            <p>Kendaraan</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Properti'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/properti')?>">
            <i class="material-icons">home</i>
            <p>Properti</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Vendor'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/vendor')?>">
            <i class="material-icons">content_paste</i>
            <p>Vendor</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Laporan'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/laporan')?>">
            <i class="material-icons">print</i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Pengguna'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('admin/pengguna')?>">
            <i class="material-icons">person</i>
            <p>Pengguna</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo"><?php echo $page; ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <form class="navbar-form">
            <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-warning btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">notifications</i>
                <span class="notification">5</span>
                <p class="d-lg-none d-md-block">
                  Some Actions
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                <a class="dropdown-item" href="#">Another Notification</a>
                <a class="dropdown-item" href="#">Another One</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  <?php echo 'Profil '.$this->session->rayon?>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo base_url('Pengguna/')?>">Lihat Profil</a>
                <a class="dropdown-item" href="<?php echo base_url('autentikasi/logout')?>">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
