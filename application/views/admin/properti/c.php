<?php if ($this->session->id_level == 1 ) :?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="card card-profile">
              <a href="<?php echo base_url('Properti/create')?>">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Tambah Properti</h4>
                </div>
              </a>
              <div class="card-body">
                <h6 class="card-category text-gray">Tambahkan Properti</h6>
                <p class="card-description">
                  Menambahkan properti kedalam daftar dengan memasukkan informasi secara detail tentang properti tersebut
                </p>
                <?php echo anchor('Properti/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="card card-profile">
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Pindah Properti</h4>
                </div>
              </a>
              <div class="card-body">
                <h6 class="card-category text-gray">Pindahkan Properti</h6>
                <p class="card-description">
                  Memindahkan properti dengan memberikan keterangan tentang kemana properti akan dipindahkan
                </p>
                <button type="button" class="btn btn-danger btn-round" data-toggle="modal" data-target="#exampleModal">
                  Pindah
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-warning">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title">Daftar Properti</h4>
                <p class="card-category"> menampilakan daftar seluruh properti yang tersedia</p>
              </div>
              <div class="col-xs-2">
                <a href="<?php echo base_url('Cetak/printPdf/').$this->uri->segment(1) ?>" rel="tooltip" title="Cetak Laporan" class="btn btn-primary">
                  <i class="material-icons">print</i>
                </a>
              </div>
            </div>
          </div>
            <div class="card-body">
              <?php if( !empty($properti) ) : ?>
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
                        Sertifikat
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
                          </td>
                          <td>
                            <?php echo $value->no_sertifikat; ?>
                          </td>
                          <td class="text-primary">
                            Rp. <?php echo number_format($value->harga); ?>
                          </td>
                          <td>
                            <a href="#" onclick="openModal(<?php echo $value->id_properti; ?>)" rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                              <i class="material-icons">zoom_out_map</i>
                            </a>
                            <a href="<?php echo base_url('Properti/edit/') . $value->id_properti ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="#" id="deleteModal" onclick="deleteModal(<?php echo $value->id_properti; ?>)" data-id="<?php echo $value->id_properti; ?>" data-toggle="modal" data-target="#confirmModal" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <?php else : ?>
                <center>
                  <p>Tidak Dapat Menampilakan Properti</p>
                </center>
              <?php endif;
              if (isset($links)) {
                echo $links;
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php ; else : ?>
