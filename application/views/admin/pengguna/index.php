<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">person</i>
            </div>
            <h4 class="card-title">Daftar Pengguna</h4>
          </div>
          <div class="card-body">
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead class="text-warning">
                  <th>#</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Rayon</th>
                  <th class="disabled-sorting text-center">Aksi</th>
                </thead>
                <tfoot>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Rayon</th>
                  <th class="text-center">Aksi</th>
                </tfoot>
                <tbody>
                  <?php foreach ($pengguna as $value): ?>
                    <tr>
                      <td>
                        <?php echo $value->id_admin; ?>
                      </td>
                      <td>
                        <?php echo $value->username; ?>
                      </td>
                      <td>
                        <?php echo $value->nama_level; ?>
                      </td>
                      <td>
                        <?php echo $value->nama_rayon; ?>
                      </td>
                      <td>
                        <!-- <a href="#" onclick="openModal(<?php echo $value->id_admin; ?>)" rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                          <i class="material-icons">zoom_out_map</i>
                        </a> -->
                        <a href="<?php echo base_url('admin/pengguna/edit/') . $value->id_admin ?>" rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="#" id="deleteModal" onclick="deleteModal(<?php echo $value->id_admin; ?>)" data-id="<?php echo $value->id_admin; ?>" data-toggle="modal" data-target="#confirmModal" rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
                Life would not be better because a chance, life will always be better because of the courage to take action at every chance.
              </p>
              <a href="<?php echo base_url('admin/pengguna/create') ?>" class="btn btn-rose btn-round">Tambah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="id_admin" value="">
            <p>Apakah Anda yakin untuk menghapus pengguna ini..?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button id="deleteButton" onclick="deletePengguna()" type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
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
      url:"<?php echo base_url('admin/pengguna/get/'); ?>"+id,
      method: 'post',
      data:null
    }).done(function(data) {
      $('#modal-content').html(data);
      $('#exampleModalCenter').modal('show');
    });
  }

  function deleteModal(id) {
    $('#id_admin').val(id);
  }

  function deletePengguna(){
    var id = $('#id_admin').val();
    $.ajax({
      url:"<?php echo base_url('pengguna/delete/'); ?>"+id,
      method: 'post',
      data:null
    }).done(function(data) {
      location.reload();
    });
  }

  $(document).ready(function(){



    // $('#deleteButton').click(function(){
    //   var ID = $(this).data('id');
    //   $.ajax({
    //     url: "<?php //echo base_url(); ?>barang/delete" + ID
    //   });
    // });

  })
  </script>
