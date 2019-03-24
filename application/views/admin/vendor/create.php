<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('admin/vendor/create') ?>" method="post" enctype="" >
          <div class="card ">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Tambah Vendor</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_pemilik_kendaraan" value="<?php echo set_value('nama_pemilik_kendaraan') ?>" required="true"/>
                    <span class="bmd-help">Tambahkan nama vendor / pemilik kendaraan.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" type="number" name="telepon" value="<?php echo set_value('telepon') ?>" required="true" />
                    <span class="bmd-help">Tambahkan nomor telepon vendor / pemilik kendaraan.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <textarea class="form-control" name="keterangan" rows="5"><?php echo set_value('keterangan') ?></textarea>
                    <span class="bmd-help">Tambahkan keterangan vendor / pemilik kendaraan.</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-rose">Simpan Data</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
