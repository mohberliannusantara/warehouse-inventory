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
            <?php //var_dump($this->session->id_admin); ?>
            <?php if ($this->session->id_level != 1 ){ ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $this->session->id_admin; ?>" disabled>ID
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $this->session->rayon; ?>" disabled>Rayon
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $this->session->level; ?>" disabled>Level
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $this->session->username; ?>" disabled>Nama
                  </div>
                </div>
              </div>
              <center>
                <a href="<?php //echo base_url('Barang/edit/') . $value->id_barang ?>" rel="tooltip" title="Ubah" class="btn btn-warning btn-round">
                  <i class="material-icons">edit</i>
                </a>
              </center>
            <?php } else { ?>
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
                        <td class="text-primary">
                          Rp. <?php echo number_format($value->harga); ?>
                        </td>
                        <td>
                          <a href="#" onclick="openModal(<?php echo $value->id_barang; ?>)" rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                            <i class="material-icons">zoom_out_map</i>
                          </a>
                          <a href="<?php echo base_url('Barang/edit/') . $value->id_barang ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                            <i class="material-icons">edit</i>
                          </a>
                          <a href="#" id="deleteModal" onclick="deleteModal(<?php echo $value->id_barang; ?>)" data-id="<?php echo $value->id_barang; ?>" data-toggle="modal" data-target="#confirmModal" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                            <i class="material-icons">close</i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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
            <?php if ($this->session->id_level != 1 ) : ?>
              <a href="#Hello" class="btn btn-warning btn-round">Hello</a>
            <?php endif;?>
          </div>
        </div>
        <?php if ($this->session->id_level == 1 ) : ?>
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
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
