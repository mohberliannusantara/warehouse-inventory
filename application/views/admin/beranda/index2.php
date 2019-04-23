<div class="content">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="../assets/img/barang.jpeg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Kelola">
                  <a href="<?php echo base_url('barang') ?>">
                    <i class="material-icons">art_track</i>
                  </a>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Extracomptable</a>
              </h4>
              <div class="card-description">
                Pengelolaan data informasi tentang extracomptable
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <!-- <h4>$899/night</h4> -->
              </div>
              <div class="stats">
                <p class="card-category">
                  <a href="<?php echo base_url('barang') ?>">Lihat Detail</a>
                  <i class="material-icons">keyboard_arrow_right</i>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="../assets/img/kendaraan.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Kelola">
                  <a href="<?php echo base_url('kendaraan') ?>">
                    <i class="material-icons">art_track</i>
                  </a>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Kendaraan</a>
              </h4>
              <div class="card-description">
                Pengelolaan data informasi tentang kendaraan
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <!-- <h4>$899/night</h4> -->
              </div>
              <div class="stats">
                <p class="card-category">
                  <a href="<?php echo base_url('kendaraan') ?>">Lihat Detail</a>
                  <i class="material-icons">keyboard_arrow_right</i>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="../assets/img/properti.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Kelola">
                  <a href="<?php echo base_url('properti') ?>">
                    <i class="material-icons">art_track</i>
                  </a>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Properti</a>
              </h4>
              <div class="card-description">
                Pengelolaan data informasi tentang properti perusahaan
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <!-- <h4>$899/night</h4> -->
              </div>
              <div class="stats">
                <p class="card-category">
                  <a href="<?php echo base_url('properti') ?>">Lihat Detail</a>
                  <i class="material-icons">keyboard_arrow_right</i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">inventory</i>
              </div>
              <p class="card-category">Extracomptable</p>
              <h3 class="card-title"><?php echo $total_barang ?></h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">zoom_out_map</i>
                <a href="<?php echo base_url('barang') ?>" class="text-secondary">Lihat Detail..</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">local_shipping</i>
              </div>
              <p class="card-category">Kendaraan</p>
              <h3 class="card-title"><?php echo $total_kendaraan ?></h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">zoom_out_map</i>
                <a href="<?php echo base_url('kendaraan') ?>" class="text-secondary">Lihat Detail..</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">home</i>
              </div>
              <p class="card-category">Properti</p>
              <h3 class="card-title"><?php echo $total_properti ?></h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">zoom_out_map</i>
                <a href="<?php echo base_url('properti') ?>" class="text-secondary">Lihat Detail..</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="card ">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons"></i>
              </div>
              <h4 class="card-title">Data Rayon</h4>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive table-sales">
                    <table class="table">
                      <thead class="text-warning">
                        <th>
                          #
                        </th>
                        <th>
                          Rayon
                        </th>
                        <th class="text-center">
                          Extracomptable
                        </th>
                        <th class="text-center">
                          Kendaraan
                        </th>
                        <th class="text-center">
                          Properti
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        $total_barang_rayon = 0;
                        $total_kendaraan_rayon = 0;
                        $total_properti_rayon = 0;
                        ?>
                        <?php foreach ($rayon as $key => $rayon): ?>
                          <tr>
                            <td>
                              <div class="flag">
                                <img src="../assets/img/favicon.png">
                              </div>
                            </td>
                            <td><?php echo $rayon->nama_rayon ?></td>
                            <?php foreach ($barang as $key => $value): ?>
                              <?php if ($value->id_rayon == $rayon->id_rayon): ?>
                                <?php $total_barang_rayon++;?>
                              <?php endif;?>
                            <?php endforeach; ?>
                            <td class="text-center">
                              <?php echo $total_barang_rayon ?>
                            </td>
                            <?php foreach ($kendaraan as $key => $value): ?>
                              <?php if ($value->id_rayon == $rayon->id_rayon): ?>
                                <?php $total_kendaraan_rayon++;?>
                              <?php endif;?>
                            <?php endforeach; ?>
                            <td class="text-center">
                              <?php echo $total_kendaraan_rayon ?>
                            </td>
                            <?php foreach ($properti as $key => $value): ?>
                              <?php if ($value->id_rayon == $rayon->id_rayon): ?>
                                <?php $total_properti_rayon++;?>
                              <?php endif;?>
                            <?php endforeach; ?>
                            <td class="text-center">
                              <?php echo $total_properti_rayon ?>
                            </td>
                          </tr>
                          <?php
                          $total_barang_rayon = 0;
                          $total_kendaraan_rayon = 0;
                          $total_properti_rayon = 0;
                          ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#<?php echo $this->session->username; ?>">
                <?php if ($this->session->gambar): ?>
                  <img class="img" src="<?php echo base_url('assets/uploads/' . $this->session->gambar) ?>" />
                  <?php ; else : ?>
                    <img class="img" src="<?php echo base_url(); ?>assets/img/faces/marc.jpg" />
                  <?php endif; ?>
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-gray"><?php echo $this->session->level; ?> / <?php echo $this->session->rayon; ?></h6>
                <h4 class="card-title"><?php echo $this->session->username; ?></h4>
                <p class="card-description">
                  Life would not be better because a chance, life will always be better because of the courage to take action at every chance.
                </p>
                <a href="<?php echo base_url('pengguna')?>" class="btn btn-warning btn-round">Lihat</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
