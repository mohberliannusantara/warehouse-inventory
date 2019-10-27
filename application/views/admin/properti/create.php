<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('admin/properti/create') ?>" method="post" enctype="multipart/form-data" >
          <div class="card ">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Tambah Properti</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_properti" value="<?php echo set_value('nama_properti') ?>" required="true" autofocus/>
                    <span class="bmd-help">Tambahkan nama properti.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <textarea class="form-control" name="alamat" rows="5" required><?php echo set_value('alamat') ?></textarea>
                    <span class="bmd-help">Tambahkan alamat properti.</span>
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
                        <input type="file" name="foto_properti" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Rayon</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="custom-select" name="rayon" required>
                      <option selected value="">Pilih Rayon </option>
                      <?php foreach ($rayon as $row): ?>
                        <option value="<?php echo $row->id_rayon ?>">
                          <?php echo $row->nama_rayon; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih rayon.</div>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Link Maps</label>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="lokasi" value="<?php echo set_value('lokasi') ?>" required="true"/>
                    <span class="bmd-help">Tambahkan link lokasi map properti.</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label label-checkbox">Wujud</label>
                <div class="col-sm-10 checkbox-radios">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="jenis_properti" value="Tanah dan Bangunan" checked> Tanah dan Bangunan
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="jenis_properti" value="Tanah"> Tanah
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control" type="text" name="status" value="<?php echo set_value('status') ?>" required="true"/>
                    <span class="bmd-help">Tambahkan status properti.</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Tahun Perolehan</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input type="text" class="form-control datepicker" name="tahun_perolehan" value="10/06/2018" required="true" />
                    <span class="bmd-help">Tambahkan tahun perolehan.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Estimasi Harga (Rp.)</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <input class="form-control number" type="text" name="harga" value="<?php echo set_value('harga') ?>"/>
                    <span class="bmd-help">Tambahkan harga properti.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">File Sertfikat (PDF)</label>
                <div class="col-sm-4">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                      <span class="btn btn-warning btn-round btn-file">
                        <span class="fileinput-new">Select File</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="file_sertifikat" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control" type="text" name="no_sertifikat" value="<?php echo set_value('no_sertifikat') ?>"/>
                    <span class="bmd-help">Tambahkan nomor sertifikat properti.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Tanggal Berlaku</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="text" class="form-control datepicker" name="tanggal_berlaku_sertifikat" value="10/06/2018"/>
                    <span class="bmd-help">Tambahkan tanggal berlaku.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Tanggal Kadaluarsa</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="text" class="form-control datepicker" name="tanggal_kadaluarsa_sertifikat" value="10/06/2018"/>
                    <span class="bmd-help">Tambahkan tanggal kadaluarsa.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Luas Tanah</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="number" class="form-control" name="luas_tanah" value="<?php echo set_value('luas_tanah') ?>" required="true" />
                    <span class="bmd-help">Tambahkan luas tanah dalam satuan m<sup>2</sup>.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Luas Bangunan</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input type="number" class="form-control" name="luas_bangunan" value="<?php echo set_value('luas_bangunan') ?>" required="true" />
                    <span class="bmd-help">Tambahkan luas bangunan dalam satuan m<sup>2</sup>.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Nomor Pajak (PBB)</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control" name="no_pajak" value="<?php echo set_value('no_pajak') ?>"/>
                    <span class="bmd-help">Tambahkan nomor pajak.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Foto / Gambar PBB</label>
                <div class="col-sm-4">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="<?php echo base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                      <span class="btn btn-warning btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto_pajak" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <textarea class="form-control" name="keterangan" rows="5"><?php echo set_value('keterangan') ?></textarea>
                    <span class="bmd-help">Tambahkan keterangan properti.</span>
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
