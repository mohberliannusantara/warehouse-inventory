<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title "><?php echo $page_title; ?></h4>
            <p class="card-category"><?php echo $page_content; ?></p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('Kendaraan/create') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_kendaraan" >Nama Kendaraan</label>
                <input type="text" class="form-control" name="nama_kendaraan" value="<?php echo $kendaraan->nama_kendaraan ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nama kendaraan.</div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select class="custom-select" name="jenis_kendaraan" required>
                      <option selected value="">Pilih Jenis Kendaraan</option>
                      <?php foreach ($jenis_kendaraan as $row): ?>
                        <option value="<?php echo $row->id_jenis_kendaraan ?>" <?php echo ($kendaraan->id_jenis_kendaraan == $row->id_jenis_kendaraan) ? 'selected':'' ?>>
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
                        <option value="<?php echo $row->id_kondisi ?>" <?php echo ($kendaraan->id_kondisi == $row->id_kondisi) ? 'selected':'' ?>>
                          <?php echo $row->nama_kondisi; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input min="1000" class="form-control number" name="harga" value="<?php echo $kendaraan->harga ?>" required >
                <div class="invalid-feedback">Masukkan Harga kendaraan.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control number" name="keterangan" rows="3" required><?php echo $kendaraan->keterangan ?></textarea>
                <div class="invalid-feedback">Isi keterangan kendaraan</div>
              </div>

              <div class="form-group">
                <label for="gambar">Foto Kendaraan</label>
                <br>
                <?php if ($kendaraan->gambar): ?>
                  <img style="width: 100px;height: 100%" src="<?php echo base_url('assets/uploads/kendaraan/').$kendaraan->gambar?>">
                  <?php ; else : ?>
                    <img src="https://via.placeholder.com/100x100" alt="" style="width:100%;">
                  <?php endif; ?>
                </div>

                <label class="file">
                  <input type="file" class="form-control-file" name="gambar">
                  <span class="file-custom"></span>
                </label>
                <div class="form-group">
                  <input class="btn btn-danger" type="submit" value="Pindah">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
