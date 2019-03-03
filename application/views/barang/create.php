<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="" method="">
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
                    <input class="form-control" type="text" name="nama_barang" required="true" />
                    <span class="bmd-help">tambahkan nama barang.</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="custom-select" name="jenis_barang" required>
                      <option selected value="">Pilih Jenis Barang</option>
                      <?php foreach ($jenis_barang as $row): ?>
                        <option value="<?php echo $row->id_jenis_barang ?>">
                          <?php echo $row->nama_jenis_barang; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih dulu kategorinya gan</div>
                  </div>
                </div>
                <label class="col-xs-2 col-form-label">Kondisi</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="custom-select" name="kondisi" required>
                      <option selected value="">Pilih Kondisi Barang</option>
                      <?php foreach ($kondisi as $row): ?>
                        <option value="<?php echo $row->id_kondisi ?>">
                          <?php echo $row->nama_kondisi; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">With help</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control">
                    <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input min="1000" class="form-control number" name="harga" value="<?php echo set_value('harga') ?>" required >
                <div class="invalid-feedback">Masukkan Harga barang.</div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" type="text" name="email" email="true" required="true" />
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" type="text" name="number" number="true" required="true" />
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" type="text" name="url" url="true" required="true" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-rose">Validate Inputs</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
