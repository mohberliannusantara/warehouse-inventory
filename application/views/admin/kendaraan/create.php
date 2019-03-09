<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="" method="">
          <div class="card ">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Tambah Kendaraan</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama_kendaraan" value="<?php echo set_value('nama_kendaraan') ?>" required="true" autofocus/>
                    <span class="bmd-help">Tambahkan nama kendaraan.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Plat Nomor</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nomor_polisi" value="<?php echo set_value('nomor_polisi') ?>" required="true" autofocus/>
                    <span class="bmd-help">Tambahkan plat nomor kendaraan.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Pengguna</label>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="pengguna" value="<?php echo set_value('pengguna') ?>" required="true" autofocus/>
                    <span class="bmd-help">Tambahkan nama pengguna kendaraan.</span>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Rayon</label>
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
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Pemilik Kendaraan</label>
                <div class="col-sm-6">
                  <div class="form-group">
                    <select class="custom-select" name="pemilik_kendaraan" required>
                      <option selected value="">Pilih Pemilik Kendaraan </option>
                      <?php foreach ($pemilik_kendaraan as $row): ?>
                        <option value="<?php echo $row->id_pemilik_kendaraan ?>">
                          <?php echo $row->nama_pemilik_kendaraan; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih pemilik kendaraan.</div>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Jenis</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="custom-select" name="jenis_kendaraan" required>
                      <option selected value="">Pilih Jenis Kendaraan</option>
                      <?php foreach ($jenis_kendaraan as $row): ?>
                        <option value="<?php echo $row->id_jenis_kendaraan ?>">
                          <?php echo $row->nama_jenis_kendaraan; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih jenis kendaraan.</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label label-checkbox">Status</label>
                <div class="col-sm-10 checkbox-radios">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked> Sewa
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="exampleRadios" value="option1"> Milik PLN
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Tanggal Berlaku</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <!-- <input class="form-control" type="date" name="harga" value="<?php echo set_value('harga') ?>" required="true" /> -->
                    <input type="text" class="form-control datepicker" name="tanggal_berlaku" value="10/06/2018" required="true" />
                    <span class="bmd-help">Tambahkan tanggal berlaku.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Stan Awal</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <input class="form-control" type="text" name="stan_awal" value="<?php echo set_value('stan_awal') ?>" required="true"/>
                    <span class="bmd-help">Tambahkan stan awal kendaraan.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Stan Akhir</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <input class="form-control" type="text" name="stan_akhir" value="<?php echo set_value('stan_akhir') ?>" required="true"/>
                    <span class="bmd-help">Tambahkan stan akhir kendaraan.</span>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <textarea class="form-control" name="keterangan" rows="5" required><?php echo set_value('keterangan') ?></textarea>
                    <span class="bmd-help">Tambahkan harga extracomptable.</span>
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
