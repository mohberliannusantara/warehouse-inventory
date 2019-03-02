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
                      Lokasi
                    </th>
                    <th>
                      Keterangan
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
                        <td>
                          <?php echo substr($value->lokasi, 0, 20) ?>
                        </td>
                        <td>
                          <?php echo substr($value->keterangan, 0, 20) ?>
                        </td>
                        <td class="text-primary">
                          Rp. <?php echo number_format($value->harga); ?>
                        </td>
                        <td>
                          <a href="#" onclick="openModal(<?php echo $value->id_properti; ?>)" rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                            <i class="material-icons">zoom_out_map</i>
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
<?php endif; ?>

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
      url:"<?php echo base_url('properti/get/'); ?>"+id,
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
      url:"<?php echo base_url('properti/delete/'); ?>"+id,
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
