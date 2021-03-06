<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title "><?php echo $page_title; ?></h4>
        <p class="card-category"> Tambahkan barang kedalam daftar dengan informasi yang lengkap</p>
      </div>
      <div class="card-body">
          <?php //echo $upload_error;?>
        <?php echo form_open_multipart('barang/insert');?>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="<?php echo set_value('nama_barang') ?>" required autofocus>
            <div class="invalid-feedback">Masukkan nama barang.</div>
          </div>

          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
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
            <div class="col-sm-3">
              <div class="form-group">
                <label for="kondisi_model">Kondisi Barang</label>
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

          <div class="form-group">
            <label for="harga">Harga</label>
            <input min="1000" class="form-control number" name="harga" value="<?php echo set_value('harga') ?>" required >
            <div class="invalid-feedback">Masukkan Harga barang.</div>
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="3" required><?php echo set_value('keterangan') ?></textarea>
            <div class="invalid-feedback">Isi keterangan barang</div>
          </div>

          <div class="form-group">
            <label for="gambar">Foto Barang</label>
          </div>
          <label class="file">
            <input type="file" class="form-control-file" name="gambar">
            <span class="file-custom"></span>
          </label>
          <div class="form-group">
            <input class="btn btn-info" type="submit" value="Simpan">
          </div>
        <?php echo form_close()?>
      </div>
    </div>
  </div>
</div>



<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
              <i class="material-icons">inventory</i>
            </div>
            <h4 class="card-title">Laporan Extracomptable</h4>
          </div>
          <div class="card-body ">
            <form method="#" action="#">
              <div class="form-group">
                <label for="rayon">Rayon</label>
                <select class="custom-select" name="rayon" required>
                  <option selected value="">Pilih Rayon</option>
                  <?php foreach ($rayon as $row): ?>
                    <option value="<?php echo $row->id_rayon ?>">
                      <?php echo $row->nama_rayon; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </form>
          </div>
          <div class="card-footer ">
            <button type="submit" class="btn btn-fill btn-rose"><i class="material-icons">arrow_downward</i> Donwload</button>
            <a href="#" target="_blank" class="btn btn-primary"><i class="material-icons">zoom_out_map</i> Preview</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">local_shipping</i>
            </div>
            <h4 class="card-title">Laporan Kendaraan</h4>
          </div>
          <div class="card-body ">
            <form method="#" action="#">
              <div class="form-group">
                <label for="rayon">Rayon</label>
                <select class="custom-select" name="rayon" required>
                  <option selected value="">Pilih Rayon</option>
                  <?php foreach ($rayon as $row): ?>
                    <option value="<?php echo $row->id_rayon ?>">
                      <?php echo $row->nama_rayon; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </form>
          </div>
          <div class="card-footer ">
            <button type="submit" class="btn btn-fill btn-warning"><i class="material-icons">arrow_downward</i> Donwload</button>
            <a href="#" target="_blank" class="btn btn-primary"><i class="material-icons">zoom_out_map</i> Preview</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">home</i>
            </div>
            <h4 class="card-title">Laporan Properti</h4>
          </div>
          <div class="card-body ">
            <form method="#" action="#">
              <div class="form-group">
                <label for="rayon">Rayon</label>
                <select class="custom-select" name="rayon" required>
                  <option selected value="">Pilih Rayon</option>
                  <?php foreach ($rayon as $row): ?>
                    <option value="<?php echo $row->id_rayon ?>">
                      <?php echo $row->nama_rayon; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </form>
          </div>
          <div class="card-footer ">
            <button type="submit" class="btn btn-fill btn-success"><i class="material-icons">arrow_downward</i> Donwload</button>
            <a href="#" target="_blank" class="btn btn-primary"><i class="material-icons">zoom_out_map</i> Preview</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">person</i>
            </div>
            <h4 class="card-title">Laporan Pengguna</h4>
          </div>
          <div class="card-body ">
            <form method="#" action="#">
              <div class="form-group">
                <label for="rayon">Pengguna</label>
                <!-- <select class="custom-select" name="rayon" required>
                <option selected value="">Pilih Rayon</option>
                <?php foreach ($rayon as $row): ?>
                <option value="<?php echo $row->id_rayon ?>">
                <?php echo $row->nama_rayon; ?>
              </option>
            <?php endforeach; ?> -->
            <h5>laporan tentang daftar admin / pengguna.</h5>
          </select>
        </div>
      </form>
    </div>
    <div class="card-footer ">
      <button type="submit" class="btn btn-info"><i class="material-icons">arrow_downward</i> Donwload</button>
      <a href="#" target="_blank" class="btn btn-primary"><i class="material-icons">zoom_out_map</i> Preview</a>
    </div>
  </div>
</div>
</div>
</div>
</div>
