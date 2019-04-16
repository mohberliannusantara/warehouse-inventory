<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title "><?php echo $page_title; ?></h4>
            <p class="card-category"> Tambahkan kendaraan kedalam daftar dengan informasi yang lengkap</p>
          </div>
          <div class="card-body">
              <?php //echo $upload_error;?>
            <form action="<?php base_url('Kendaraan/create') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_kendaraan">Nama Kendaraan</label>
                <input type="text" class="form-control" name="nama_kendaraan" value="<?php echo set_value('nama_kendaraan') ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nama kendaraan.</div>
              </div>

              <div class="form-group">
                <label for="plat">Plat</label>
                <input type="text" class="form-control" name="plat" value="<?php echo set_value('plat') ?>" required>
                <div class="invalid-feedback">Masukkan Plat kendaraan.</div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select class="custom-select" name="jenis_kendaraan" required>
                      <option selected value="">Pilih Jenis Kendaraan</option>
                      <?php foreach ($jenis_kendaraan as $row): ?>
                        <option value="<?php echo $row->id_jenis_kendaraan ?>">
                          <?php echo $row->nama_jenis_kendaraan; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih dulu kategorinya gan</div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="kondisi_model">Kondisi Kendaraan</label>
                    <select class="custom-select" name="kondisi" required>
                      <option selected value="">Pilih Kondisi Kendaraan</option>
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
                <div class="invalid-feedback">Masukkan Harga kendaraan.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" required><?php echo set_value('keterangan') ?></textarea>
                <div class="invalid-feedback">Isi keterangan kendaraan</div>
              </div>

              <div class="form-group">
                <label for="gambar">Foto Kendaraan</label>
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
