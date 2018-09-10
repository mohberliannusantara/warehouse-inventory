<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <a href="<?php echo base_url('Barang/')?>">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons" style="color: white;">inventory</i>
              </div>
            </a>
            <p class="card-category">Barang</p>
            <h3 class="card-title" rel="tooltip" title="Barang"><?php echo $total_barang; ?></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Estimasi Asset Barang Rp. <h5><?php echo number_format($total_harga_barang); ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <a href="<?php echo base_url('Kendaraan/')?>">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons" style="color: white;">local_shipping</i>
              </div>
            </a>
            <p class="card-category">Kendaraan</p>
            <h3 class="card-title" rel="tooltip" title="Kendaraan"><?php echo $total_kendaraan; ?></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Estimasi Asset Kendaraan Rp. <h5><?php echo number_format($total_harga_kendaraan); ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <a href="<?php echo base_url('Properti')?>">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons" style="color: white;">home</i>
              </div>
            </a>
            <p class="card-category">Properti</p>
            <h3 class="card-title" rel="tooltip" title="Properti"><?php echo $total_properti; ?></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Estimasi Asset Properti Rp. <h5><?php echo number_format($total_harga_properti); ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-tabs card-header-warning">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Aktivitas:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#profile" data-toggle="tab">
                      <i class="material-icons">inventory</i> Barang
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#messages" data-toggle="tab">
                      <i class="material-icons">local_shipping</i> Kendaraan
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="tab">
                      <i class="material-icons">home</i> Properti
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-warning">
                      <th>
                        ID
                      </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        Kondisi
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Keterangan
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach ($barang as $value): ?>
                        <tr>
                          <td>
                            <?php echo $value->id_barang; ?>
                          </td>
                          <td>
                            <?php echo $value->nama_barang; ?>
                          </td>
                          <td>
                            <?php echo $value->nama_kondisi; ?>
                          </td>
                          <td class="text-warning">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <?php echo substr($value->keterangan, 0, 25) ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <center>
                  <a href="<?php echo base_url('Barang/')?>" class="btn btn-sm btn-primary">Lihat Lebih Banyak</a>
                </center>
              </div>
              <div class="tab-pane" id="messages">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-warning">
                      <th>
                        ID
                      </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        Plat
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Keterangan
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach ($kendaraan as $value): ?>
                        <tr>
                          <td>
                            <?php echo $value->id_kendaraan; ?>
                          </td>
                          <td>
                            <?php echo $value->nama_kendaraan; ?>
                          </td>
                          <td>
                            <?php echo $value->plat; ?>
                          </td>
                          <td class="text-warning">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <?php echo substr($value->keterangan, 0, 25) ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <center>
                  <a href="<?php echo base_url('Kendaraan/')?>" class="btn btn-sm btn-primary">Lihat Lebih Banyak</a>
                </center>
              </div>
              <div class="tab-pane" id="settings">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-warning">
                      <th>
                        ID
                      </th>
                      <th>
                        Luas
                      </th>
                      <th>
                        Nomor Sertifikat
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Keterangan
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach ($properti as $value): ?>
                        <tr>
                          <td>
                            <?php echo $value->id_properti; ?>
                          </td>
                          <td>
                            <?php echo $value->luas, " M2"; ?>
                          </td>
                          <td>
                            <?php echo $value->no_sertifikat; ?>
                          </td>
                          <td class="text-warning">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <?php echo substr($value->keterangan, 0, 25) ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <center>
                  <a href="<?php echo base_url('Properti/')?>" class="btn btn-sm btn-primary">Lihat Lebih Banyak</a>
                </center>
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
                <img class="img" src="<?php echo base_url('assets/uploads/admin/' . $this->session->gambar) ?>" />
                <?php ; else : ?>
                  <img class="img" src="<?php echo base_url(); ?>assets/img/faces/marc.jpg" />
                <?php endif; ?>
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray"><?php echo $this->session->level; ?> / <?php echo $this->session->rayon; ?></h6>
              <h4 class="card-title"><?php echo $this->session->username; ?></h4>
            <p class="card-description">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <a href="<?php echo base_url('Pengguna/')?>" class="btn btn-primary btn-round">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
