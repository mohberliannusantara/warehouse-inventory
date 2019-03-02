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

  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"> -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
  <!-- MDBootstrap Datatables  -->
  <link href="<?php echo base_url('assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="<?php echo base_url('assets/img/sidebar-3.jpg'); ?>">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a href="<?php echo base_url('Beranda'); ?>" class="simple-text logo-normal">
        <img src="<?php echo base_url('assets/img/favicon.png') ?>" alt="" style="width:10%;">
        PT. PLN (Persero)
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item <?php if ($page == 'Beranda'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('beranda') ?>">
            <i class="material-icons">dashboard</i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Barang'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('barang')?>">
            <i class="material-icons">inventory</i>
            <p>Barang</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Kendaraan'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('kendaraan')?>">
            <i class="material-icons">local_shipping</i>
            <p>Kendaraan</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Properti'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('properti')?>">
            <i class="material-icons">home</i>
            <p>Properti</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Ruang'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('properti')?>">
            <i class="material-icons">bookmark</i>
            <p>Ruang</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Laporan'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('laporan')?>">
            <i class="material-icons">print</i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-item <?php if ($page == 'Pengguna'): ?>active<?php endif; ?>">
          <a class="nav-link" href="<?php echo site_url('pengguna')?>">
            <i class="material-icons">person</i>
            <p>Profil</p>
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
