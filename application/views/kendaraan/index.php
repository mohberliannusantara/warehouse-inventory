<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="card card-profile">
            <a href="<?php echo base_url('Kendaraan/create')?>">
              <div class="card-header card-header-info">
                <h4 class="card-title">Tambah Kendaraan</h4>
              </div>
            </a>
            <div class="card-body">
              <h6 class="card-category text-gray">Tambahkan Kendaraan</h6>
              <p class="card-description">
                Menambahkan kendaraan kedalam daftar dengan memasukkan informasi secara detail tentang kendaraan tersebut
              </p>
              <?php echo anchor('Kendaraan/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card card-profile">
            <a href="#" data-toggle="modal" data-target="#exampleModal">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Pindah Kendaraan</h4>
              </div>
            </a>
            <div class="card-body">
              <h6 class="card-category text-gray">Pindahkan Kendaraan</h6>
              <p class="card-description">
                Memindahkan kendaraan dengan memberikan keterangan tentang kemana kendaraan akan dipindahkan
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
            <h4 class="card-title">Daftar Kendaraan</h4>
            <p class="card-category"> menampilakan daftar seluruh kendaraan yang tersedia</p>
          </div>
          <div class="card-body">
            <?php if( !empty($kendaraan) ) : ?>
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
              <?php else : ?>
                <center>
                  <p>Tidak Dapat Menampilakan Kendaraan</p>
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
              <label class="bmd-label-floating">ID Kendaraan</label>
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
            <input type="hidden" id="id_kendaraan" value="">
            <p>Apakah Anda yakin untuk menghapus kendaraan ini..?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button id="deleteButton" onclick="deleteKendaraan()" type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Info Kendaraan</h5>
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
        url:"<?php echo base_url('kendaraan/get/'); ?>"+id,
        method: 'post',
        data:null
      }).done(function(data) {
        $('#modal-content').html(data);
        $('#exampleModalCenter').modal('show');
      });
    }

    function deleteModal(id) {
      $('#id_kendaraan').val(id);
    }

    function deleteKendaraan(){
       var id = $('#id_kendaraan').val();
       $.ajax({
        url:"<?php echo base_url('kendaraan/delete/'); ?>"+id,
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
      //     url: "<?php //echo base_url(); ?>kendaraan/delete" + ID
      //   });
      // });

    })
  </script>
