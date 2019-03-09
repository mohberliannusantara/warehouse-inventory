<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Tambah Properti</h4>
            <p class="card-category"> Tambahkan data properti kedalam daftar dengan menyertakan informasi secara lengkap</p>
          </div>
          <div class="card-body">
            <?php //echo $upload_error;?>
            <form action="<?php base_url('admin/properti/create') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_properti">Nama Properti</label>
                <input type="text" class="form-control" name="nama_properti" value="<?php echo set_value('nama_properti') ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nama properti.</div>
              </div>

              <div class="form-group">
                <label for="jenis_barang">Jenis / Wujud Properti</label>
                <select class="custom-select" name="jenis_properti" required>
                  <option selected value="">Pilih Jenis Properti</option>
                  <option value="Tanah dan Bangunan">Tanah dan Bangunan</option>
                  <option value="Tanah dan Bangunan">Tanah/lahan kosong</option>
                </select>
                <div class="invalid-feedback">Pilih Jenis Properti</div>
              </div>

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
                <div class="invalid-feedback">Pilih rayon</div>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat') ?>" required>
                <div class="invalid-feedback">Masukkan alamat properti.</div>
              </div>

              <div class="form-group">
                <label for="lokasi">Link Maps/Denah</label>
                <input type="text" class="form-control" name="lokasi" value="<?php echo set_value('lokasi') ?>" required>
                <div class="invalid-feedback">Masukkan lokasi properti.</div>
              </div>

              <div class="form-group">
                <label for="luas_tanah">Luas Tanah (M<sup>2</sup>)</label>
                <input type="number" class="form-control number" name="luas_tanah" min="10" value="<?php echo set_value('luas_tanah') ?>" required>
                <div class="invalid-feedback">Masukkan luas tanah.</div>
              </div>

              <div class="form-group">
                <label for="luas_bangunan">Luas Bangunan (M<sup>2</sup>)</label>
                <input type="number" class="form-control number" name="luas_bangunan" min="10" value="<?php echo set_value('luas_bangunan') ?>" required>
                <div class="invalid-feedback">Masukkan luas bangunan.</div>
              </div>

              <div class="form-group">
                <label for="harga">Harga Perolehan</label>
                <input type="number" class="form-control number" name="harga" min="10" value="<?php echo set_value('harga') ?>" required>
                <div class="invalid-feedback">Masukkan harga perolehan properti.</div>
              </div>

              <div class="form-group">
                <label for="tangal_perolehan">Tanggal Perolehan</label>
                <input type="date" class="form-control number" name="tangal_perolehan" min="10" value="<?php echo set_value('tangal_perolehan') ?>" required>
                <div class="invalid-feedback">Masukkan tangal perolehan properti.</div>
              </div>

              <div class="form-group">
                <label for="no_sertifikat">Nomor Sertfikat</label>
                <input type="number" class="form-control" name="no_sertifikat" value="<?php echo set_value('no_sertifikat') ?>" required>
                <div class="invalid-feedback">Masukkan nomor sertifikat.</div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tangal_berlaku_sertifikat">Tanggal Berlaku</label>
                    <input type="date" class="form-control number" name="tangal_berlaku_sertifikat" min="10" value="<?php echo set_value('tangal_berlaku_sertifikat') ?>" required>
                    <div class="invalid-feedback">Masukkan tangal berlaku sertifikat.</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tangal_kadaluarsa_sertifikat">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control number" name="tangal_kadaluarsa_sertifikat" min="10" value="<?php echo set_value('tangal_kadaluarsa_sertifikat') ?>" required>
                    <div class="invalid-feedback">Masukkan tangal kadaluarsa sertifikat.</div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="no_pajak">Nomor Objek Pajak</label>
                <input type="number" class="form-control" name="no_pajak" value="<?php echo set_value('no_pajak') ?>" required>
                <div class="invalid-feedback">Masukkan nomor objek pajak.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" required><?php echo set_value('keterangan') ?></textarea>
                <div class="invalid-feedback">Isi keterangan properti</div>
              </div>

              <div class="form-group">
                <label for="foto_properti">Foto Properti</label>
              </div>
              <label class="file">
                <input type="file" class="form-control-file" name="foto_properti">
                <span class="file-custom"></span>
              </label>

              <div class="form-group">
                <label for="foto_sertifikat">Scan Sertfikat</label>
              </div>
              <label class="file">
                <input type="file" class="form-control-file" name="foto_sertifikat">
                <span class="file-custom"></span>
              </label>

              <div class="form-group">
                <label for="foto_pajak">Scan PBB</label>
              </div>
              <label class="file">
                <input type="file" class="form-control-file" name="foto_pajak">
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
    </div>
  </div>
