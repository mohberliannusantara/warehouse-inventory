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
            <form action="<?php base_url('Properti/create') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="no_sertifikat">Nomor Sertfikat</label>
                <input type="number" class="form-control" name="no_sertifikat" value="<?php echo set_value('no_sertifikat') ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nomor sertifikat.</div>
              </div>

              <div class="form-group">
                <label for="luas">Luas (M2)</label>
                <input type="text" class="form-control number" name="luas" value="<?php echo set_value('luas') ?>" required>
                <div class="invalid-feedback">Masukkan luas.</div>
              </div>

              <div class="form-group">
                <label for="lokasi">Lokasi / Alamat</label>
                <input type="text" class="form-control" name="lokasi" value="<?php echo set_value('lokasi') ?>" required>
                <div class="invalid-feedback">Masukkan lokasi atau alamat.</div>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input min="1000" class="form-control number" name="harga" value="<?php echo set_value('harga') ?>" required >
                <div class="invalid-feedback">Masukkan Harga properti.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" required><?php echo set_value('keterangan') ?></textarea>
                <div class="invalid-feedback">Isi keterangan properti</div>
              </div>

              <div class="form-group">
                <label for="gambar">Foto Properti</label>
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
    </div>
  </div>
