<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">local_shipping</i>
            </div>
            <h4 class="card-title">Daftar Kendaraan</h4>
          </div>
          <div class="card-body">
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
                      <td><?php echo substr($value->nama_properti,0,45); ?></td>
                      <td class="text-warning"><?php echo $value->nama_rayon; ?></td>
                      <td><?php echo substr($value->alamat,0,45); ?></td>
                      <td class="text-center">
                        <a href="#" onclick="openModal(<?php echo $value->id_properti; ?>)"
                          rel="tooltip" title="Lihat" class="btn btn-sm btn-success">
                          <i class="material-icons">zoom_out_map</i>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    url: "<?php echo base_url('properti/get/'); ?>" + id,
    method: 'post',
    data: null
  }).done(function(data) {
    $('#modal-content').html(data);
    $('#exampleModalCenter').modal('show');
  });
}
</script>
