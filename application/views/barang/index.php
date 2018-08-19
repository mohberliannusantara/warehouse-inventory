<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="card card-profile">
            <a href="<?php echo base_url('Barang/create')?>">
              <div class="card-header card-header-info">
                <h4 class="card-title">Tambah Barang</h4>
              </div>
            </a>
            <div class="card-body">
              <h6 class="card-category text-gray">Tambahkan Barang</h6>
              <p class="card-description">
                Menambahkan barang kedalam daftar dengan memasukkan informasi secara detail tentang barang tersebut
              </p>
              <?php echo anchor('Barang/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card card-profile">
            <a href="#" data-toggle="modal" data-target="#exampleModal">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Pindah Barang</h4>
              </div>
            </a>
            <div class="card-body">
              <h6 class="card-category text-gray">Pindahkan Barang</h6>
              <p class="card-description">
                Memindahkan barang dengan memberikan keterangan tentang kemana barang akan dipindahkan
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
            <h4 class="card-title">Daftar Barang</h4>
            <p class="card-category"> menampilakan daftar seluruh barang yang tersedia</p>
          </div>
          <div class="card-body">
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
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">ID Barang</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php //echo form_open('Login/login')?>
      <div class="modal-body">
        <form class="navbar-form">
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" placeholder="Search...">
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
<script type="text/javascript">
  function openModal(id) {
    $.ajax({
      url:"{{ base_url('Barang/get/') }}"+id,
      method: 'post',
      data:null
    }).done(function(data) {
      $('#modal-content').html(data);
      $('#exampleModalCenter').modal('show');
    });
  }
</script>
