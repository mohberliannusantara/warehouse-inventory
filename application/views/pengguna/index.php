<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title "><?php echo $page_title; ?></h4>
            <p class="card-category">melihat daftar dan detail profil pengguna</p>
          </div>
          <div class="card-body">
            <?php if ($_SESSION['logged_in']->id_level != 1 ){ ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="bmd-label-floating">Adress</label> -->
                  <input type="text" class="form-control">ID
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="bmd-label-floating">Adress</label> -->
                  <input type="text" class="form-control">Rayon
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="bmd-label-floating">Rayon</label> -->
                  <input type="text" class="form-control">Level
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="bmd-label-floating">Rayon</label> -->
                  <input type="text" class="form-control">Nama
                </div>
              </div>
            </div>
            <center>
              <a href="<?php //echo base_url('Barang/edit/') . $value->id_barang ?>" rel="tooltip" title="Ubah" class="btn btn-warning btn-round">
                <i class="material-icons">edit</i>
              </a>
            </center>
            <?php } else { ?>

            <?php }; ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="<?php echo base_url(); ?>assets/img/faces/marc.jpg" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-description">
              Being honest may not get you a lot of friends but it’ll always get you the right ones..
            </p>
            <!-- <a href="#Hello" class="btn btn-warning btn-round">Hello</a> -->
          </div>
        </div>
        <div class="card card-profile">
          <a href="<?php echo base_url('Barang/create')?>">
            <div class="card-header card-header-info">
              <h4 class="card-title">Tambah Pengguna</h4>
            </div>
          </a>
          <div class="card-body">
            <h4 class="card-title">Tambah Pengguna</h4>
            <p class="card-description">
              Tambahkan pengguna untuk dapat mengelola inventori
            </p>
            <?php echo anchor('Barang/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
