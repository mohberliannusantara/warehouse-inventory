<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-pricing card-raised">
          <div class="card-body">
            <h6 class="card-category">Tambah Data</h6>
            <a href="<?php echo base_url('admin/properti/create') ?>">
              <div class="card-icon icon-rose">
                <i class="material-icons">add</i>
              </div>
            </a>
            <h3 class="card-title">Properti</h3>
            <p class="card-description">
              Tambahkan data properti kedalam daftar
            </p>
            <a href="<?php echo site_url('admin/properti/create')?>"
              class="btn btn-rose btn-round">Tambah</a>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">home</i>
              </div>
              <h4 class="card-title">Daftar Properti</h4>
            </div>
            <div class="card-body">
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr class="text-warning">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Rayon</th>
                    <th>Alamat</th>
                    <th class="disabled-sorting text-center">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Rayon</th>
                    <th>Alamat</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($properti as $key => $value): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo substr($value->nama_properti,0,28); ?></td>
                      <td class="text-warning"><?php echo $value->nama_rayon; ?></td>
                      <td><?php echo substr($value->alamat,0,26); ?></td>
                      <td class="text-center">
                        <a href="#" onclick="openModal(<?php echo $value->id_properti; ?>)"
                          rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                          <i class="material-icons">zoom_out_map</i>
                        </a>
                        <a href="<?php echo base_url('admin/properti/edit/') . $value->id_properti ?>"
                          rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="<?php echo base_url('admin/properti/delete/') . $value->id_properti ?>"
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
          <label class="bmd-label-floating">ID Properti</label>
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
        <input type="hidden" id="id_properti" value="">
        <p>Apakah Anda yakin untuk menghapus properti ini..?</p>
      </div>
    </div>
    <div class="modal-footer">
      <button id="deleteButton" onclick="deleteProperti()" type="submit" class="btn btn-danger">Hapus</button>
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
      <h5 class="modal-title" id="exampleModalLongTitle">Detail Properti</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modal-content">

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Tutup</button>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
function openModal(id) {
  $.ajax({
    url: "<?php echo base_url('admin/properti/get/'); ?>" + id,
    method: 'post',
    data: null
  }).done(function(data) {
    $('#modal-content').html(data);
    $('#exampleModalCenter').modal('show');
  });
}

function deleteModal(id) {
  $('#id_properti').val(id);
}

function deleteProperti() {
  var id = $('#id_properti').val();
  $.ajax({
    url: "<?php echo base_url('admin/properti/delete/'); ?>" + id,
    method: 'post',
    data: null
  }).done(function(data) {
    location.reload();
  });
}
</script>
