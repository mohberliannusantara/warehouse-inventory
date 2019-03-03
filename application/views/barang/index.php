<div class="content">
  <div class="container-fluid">
    <div class="col-md-1-12">
      <div class="row">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">Daftar Properti</h4>
            <p class="card-category"> menampilakan daftar seluruh properti yang tersedia</p>
          </div>
          <div class="card-body">
          <a href="<?php echo base_url('Barang/create/') ?>" rel="tooltip" title="Tambah" class="btn btn-sm btn-info">
                          <i class="material-icons">add</i>
              </a>
              <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead class="text-warning">
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jenis Barang</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>aksi</th>
                  </thead>
                  <tbody>
                  <?php foreach ($barang as $value):?>
                      <tr>
                        <td><?php echo $value->nama_barang?></td>
                        <td><?php echo $value->harga?></td>
                        <td><?php echo $value->nama_jenis_barang?></td>
                        <td><?php echo $value->nama_kondisi?></td>
                        <td><?php echo $value->keterangan?></td>
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
                      <?php endforeach?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      url:"<?php echo base_url('barang/get/'); ?>"+id,
      method: 'post',
      data:null
    }).done(function(data) {
      $('#modal-content').html(data);
      $('#exampleModalCenter').modal('show');
    });
  }

  function deleteModal(id) {
    $('#id_barang').val(id);
  }

  function deleteBarang(){
     var id = $('#id_barang').val();
     $.ajax({
      url:"<?php echo base_url('barang/delete/'); ?>"+id,
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
