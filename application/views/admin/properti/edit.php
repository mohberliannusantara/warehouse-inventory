<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('admin/properti/edit/') .$properti->id_properti ?>" method="post" enctype="multipart/form-data" >
          <div class="card ">
            <div class="card-header card-header-primary card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Ubah Properti</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_properti" value="<?php echo $properti->nama_properti ?>" required="true" autofocus/>
                    <span class="bmd-help">Ubah nama properti.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <textarea class="form-control" name="alamat" rows="5" required><?php echo $properti->alamat; ?></textarea>
                    <span class="bmd-help">Ubah alamat properti.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Foto / Gambar</label>
                <div class="col-sm-3">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <?php if( $properti->foto_properti ) : ?>
                        <img src="<?php echo base_url('assets/uploads/properti/').$properti->foto_properti?>">
                        <?php ; else : ?>
                          <img src="<?php echo base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                        <?php endif; ?>
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-warning btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="foto_properti" value=<?php echo $properti->foto_properti?>/>
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
                            <option value="<?php echo $row->id_rayon ?>" <?php echo ($properti->id_rayon == $row->id_rayon) ? 'selected':'' ?>>
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
                        <input class="form-control" type="text" name="lokasi" value="<?php echo $properti->lokasi ?>" required="true"/>
                        <span class="bmd-help">Ubah link lokasi map properti.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label label-checkbox">Wujud</label>
                    <div class="col-sm-10 checkbox-radios">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="jenis_properti" value="Tanah dan Bangunan" <?php echo set_value('jenis_properti', $properti->jenis_properti) == "Tanah dan Bangunan" ? "checked" : "";  ?>> Tanah dan Bangunan
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="jenis_properti" value="Tanah" <?php echo set_value('jenis_properti', $properti->jenis_properti) == "Tanah" ? "checked" : "";  ?>> Tanah
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
                        <input class="form-control" type="text" name="status" value="<?php echo set_value('status') ?>"/>
                        <span class="bmd-help">Ubah status properti.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tahun Perolehan</label>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <?php if ($properti->tahun_perolehan): ?>
                          <input type="text" class="form-control datepicker" name="tahun_perolehan" value="<?php echo date('m/d/Y', strtotime($properti->tahun_perolehan)) ?>" required="true" />
                        <?php else: ?>
                          <input type="text" class="form-control datepicker" name="tahun_perolehan" value="" required="true" />
                        <?php endif; ?>
                        <span class="bmd-help">Ubah tahun perolehan.</span>
                      </div>
                    </div>
                    <label class="col-xs-2 col-form-label">Estimasi Harga</label>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <input class="form-control number" type="text" name="harga" value="<?php echo $properti->harga ?>" required="true"/>
                        <span class="bmd-help">Ubah harga properti.</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Foto / Gambar Sertfikat</label>
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <?php if ($properti->foto_sertifikat): ?>
                            <img src="<?php echo base_url('assets/uploads/properti/sertifikat/').$properti->foto_sertifikat ?>">
                          <?php else: ?>
                            <img src="<?php echo base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                          <?php endif; ?>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-warning btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="foto_sertifikat" />
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
                        <input class="form-control" type="text" name="no_sertifikat" value="<?php echo $properti->no_sertifikat ?>" required="true"/>
                        <span class="bmd-help">Ubah nomor sertifikat properti.</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tanggal Berlaku</label>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control datepicker" name="tanggal_berlaku_sertifikat" value="<?php echo date('m/d/Y', strtotime($properti->tanggal_berlaku_sertifikat)) ?>" required="true" />
                        <span class="bmd-help">Ubah tanggal berlaku.</span>
                      </div>
                    </div>
                    <label class="col-xs-2 col-form-label">Tanggal Kadaluarsa</label>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control datepicker" name="tanggal_kadaluarsa_sertifikat" value="<?php echo date('m/d/Y', strtotime($properti->tanggal_kadaluarsa_sertifikat)) ?>" required="true" />
                        <span class="bmd-help">Ubah tanggal kadaluarsa.</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Luas Tanah</label>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="number" class="form-control" name="luas_tanah" value="<?php echo $properti->luas_tanah ?>" required="true" />
                        <span class="bmd-help">Ubah luas tanah dalam satuan m<sup>2</sup>.</span>
                      </div>
                    </div>
                    <label class="col-xs-2 col-form-label">Luas Bangunan</label>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="number" class="form-control" name="luas_bangunan" value="<?php echo $properti->luas_bangunan ?>" required="true" />
                        <span class="bmd-help">Ubah luas bangunan dalam satuan m<sup>2</sup>.</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Nomor Pajak (PBB)</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="text" class="form-control" name="no_pajak" value="<?php echo $properti->no_pajak ?>" required="true" />
                        <span class="bmd-help">Ubah nomor pajak.</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Foto / Gambar PBB</label>
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <?php if ($properti->foto_pajak): ?>
                            <img src="<?php echo base_url('assets/uploads/properti/pajak/').$properti->foto_pajak ?>">
                          <?php else: ?>
                            <img src="<?php echo base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                          <?php endif; ?>
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
                        <textarea class="form-control" name="keterangan" rows="5"><?php echo $properti->keterangan ?></textarea>
                        <span class="bmd-help">Ubah keterangan properti.</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
