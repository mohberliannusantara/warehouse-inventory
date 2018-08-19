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
            <p class="card-category">Jumlah Barang</p>
            <h3 class="card-title"><?php echo $total_barang; ?></h3>
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
            <h3 class="card-title"><?php echo $total_kendaraan; ?></h3>
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
            <h3 class="card-title"><?php echo $total_properti; ?></h3>
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
                        aksi
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
                            <a href="<?php echo base_url('Barang/edit/') . $value->id_barang ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="<?php echo base_url('Barang/delete/') . $value->id_barang ?>" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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
                        Jenis
                      </th>
                      <th>
                        Kondisi
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        aksi
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
                            <?php echo $value->nama_jenis_kendaraan; ?>
                          </td>
                          <td>
                            <?php echo $value->nama_kondisi; ?>
                          </td>
                          <td class="text-warning">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url('Kendaraan/edit/') . $value->id_kendaraan ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="<?php echo base_url('Kendaraan/delete/') . $value->id_kendaraan ?>" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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
                        aksi
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
                          <td>
                            <?php echo $value->no_sertifikat; ?>
                          </td>
                          </td>
                          <td class="text-warning">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url('Properti/edit/') . $value->id_properti ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="<?php echo base_url('Properti/delete/') . $value->id_properti ?>" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
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
            <a href="#pablo">
              <img class="img" src="<?php echo base_url(); ?>assets/img/faces/marc.jpg" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-description">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <a href="<?php echo base_url('Pengguna/')?>" class="btn btn-warning btn-round">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
