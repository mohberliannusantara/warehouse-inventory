<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-pricing card-raised">
          <div class="card-body">
            <h6 class="card-category">Tambah Data</h6>
            <div class="card-icon icon-rose">
              <i class="material-icons">add</i>
            </div>
            <h3 class="card-title">Kendaraan</h3>
            <p class="card-description">
              Tambahkan data kendaraan kedalam daftar
            </p>
            <a href="<?php echo base_url('admin/kendaraan/create') ?>"
              class="btn btn-rose btn-round">Tambah</a>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">local_shipping</i>
              </div>
              <h4 class="card-title">Daftar Kendaraan</h4>
            </div>
            <div class="card-body">
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr class="text-warning">
                    <th>Plat</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Rayon</th>
                    <th>Status</th>
                    <th>Masa Berlaku</th>
                    <th class="disabled-sorting text-center">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Plat</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Rayon</th>
                    <th>Status</th>
                    <th>Masa Berlaku</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($kendaraan as $value): ?>
                    <tr>
                      <td><?php echo $value->nomor_polisi ?></td>
                      <td><?php echo $value->nama_kendaraan; ?></td>
                      <td><?php echo $value->nama_jenis_kendaraan; ?></td>
                      <td class="text-warning"><?php echo $value->nama_rayon; ?></td>
                      <td><?php echo $value->status; ?></td>
                      <td><?php echo $value->tanggal_berlaku; ?></td>
                      <td class="text-center">
                        <a href="#" onclick="openModal(<?php echo $value->id_kendaraan?>)" rel="tooltip" title="Lihat"
                          class="btn btn-sm btn-success">
                          <i class="material-icons">zoom_out_map</i>
                        </a>
                        <a href="<?php echo base_url('Kendaraa/edit/') . $value->id_kendaraan ?>"
                          rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="<?php echo base_url('Kendaraa/delete/') . $value->id_kendaraan ?>"
                          rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                          <i class="material-icons">close</i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="exampleModalLabel">Cari</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php //echo form_open('Login/login')?>
    <div class="modal-body">
      <form class="navbar-form">
        <div class="input-group no-border">
          <label class="bmd-label-floating">ID Barang</label>
          <input type="text" class="form-control">
          <button type="submit" class="btn btn-warning btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title" id="exampleModalLabel">Hapus</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <input type="hidden" id="id_barang" value="">
        <p>Apakah Anda yakin untuk menghapus barang ini..?</p>
      </div>
    </div>
    <div class="modal-footer">
      <button id="deleteButton" onclick="deleteBarang()" type="submit" class="btn btn-danger">Hapus</button>
      <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Info Barang</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modal-content">

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
function openModal(id) {
  $.ajax({
    url: "<?php echo base_url('admin/kendaraan/get/'); ?>" + id,
    method: 'post',
    data: null
  }).done(function(data) {
    $('#modal-content').html(data);
    $('#exampleModalCenter').modal('show');
  });
}

function deleteModal(id) {
  $('#id_barang').val(id);
}

function deleteBarang() {
  var id = $('#id_barang').val();
  $.ajax({
    url: "<?php echo base_url('admin/kendaraan/delete/'); ?>" + id,
    method: 'post',
    data: null
  }).done(function(data) {
    location.reload();
  });
}
</script>
