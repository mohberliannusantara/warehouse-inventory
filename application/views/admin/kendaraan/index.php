<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title">Daftar Kendaraan</h4>
                <p class="card-category"> menampilakan daftar seluruh kendaraan yang tersedia</p>
              </div>
              <div class="col-xs-2">
                <a href="<?php echo base_url('Cetak/printPdf/').$this->uri->segment(1) ?>" rel="tooltip" title="Cetak Laporan" class="btn btn-primary">
                  <i class="material-icons">print</i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        <?php echo $value->plat; ?>
                      </td>
                      <td class="text-primary">
                        Rp. <?php echo number_format($value->harga); ?>
                      </td>
                      <td>
                        <a href="#" onclick="openModal(<?php echo $value->id_kendaraan; ?>)" rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                          <i class="material-icons">zoom_out_map</i>
                        </a>
                        <a href="<?php echo base_url('Kendaraan/edit/') . $value->id_kendaraan ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="#" id="deleteModal" onclick="deleteModal(<?php echo $value->id_kendaraan; ?>)" data-id="<?php echo $value->id_kendaraan; ?>" data-toggle="modal" data-target="#confirmModal" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
