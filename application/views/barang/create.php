<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('barang/create') ?>" method="post" enctype="multipart/form-data" >
          <div class="card ">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Tambah Extracomptable</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_barang" value="<?php echo set_value('nama_barang') ?>" required="true" autofocus/>
                    <span class="bmd-help">Tambahkan nama extracomptable.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <select class="custom-select" name="jenis" required>
                      <option selected value="">Pilih Jenis Extracomptable</option>
                      <?php foreach ($jenis as $row): ?>
                        <option value="<?php echo $row->id_jenis_barang ?>">
                          <?php echo $row->nama_jenis_barang; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih jenis extracomptable.</div>
                  </div>
                </div>
                <label class="col-xs-3 col-form-label">Kondisi</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <select class="custom-select" name="kondisi" required>
                      <option selected value="">Pilih Kondisi</option>
                      <?php foreach ($kondisi as $row): ?>
                        <option value="<?php echo $row->id_kondisi ?>">
                          <?php echo $row->nama_kondisi; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih kondisi extracomptable.</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control number" type="text" name="harga" value="<?php echo set_value('harga') ?>" required="true" />
                    <span class="bmd-help">Tambahkan harga extracomptable.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <textarea class="form-control" name="keterangan" rows="5"><?php echo set_value('keterangan') ?></textarea>
                    <span class="bmd-help">Tambahkan keterangan extracomptable.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Foto / Gambar</label>
                <div class="col-sm-3">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="<?php echo base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                      <span class="btn btn-warning btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="gambar" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
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
