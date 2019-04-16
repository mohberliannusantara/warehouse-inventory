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
            <form action="<?php base_url('Properti/create') ?>" method="post" enctype="multipart/form-data">
              <center>
                <?php if( $properti->gambar ) : ?>
                  <img style="width: 25%;" src="<?php echo base_url('assets/uploads/properti/').$properti->gambar?>">
                  <?php ; else : ?>
                    <img src="https://via.placeholder.com/350x250" alt="" style="width:25%;">
                  <?php endif; ?>
                </center>
              <div class="form-group">
                <label for="no_sertifikat">Nomor Sertfikat</label>
                <input type="text" class="form-control" name="no_sertifikat" value="<?php echo $properti->no_sertifikat ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nomor sertifikat.</div>
              </div>

              <div class="form-group">
                <label for="luas">Luas (M2)</label>
                <input type="text" class="form-control number" name="luas" value="<?php echo $properti->luas ?>" required>
                <div class="invalid-feedback">Masukkan luas.</div>
              </div>

              <div class="form-group">
                <label for="lokasi">Lokasi / Alamat</label>
                <input type="text" class="form-control" name="lokasi" value="<?php echo $properti->lokasi ?>" required>
                <div class="invalid-feedback">Masukkan lokasi atau alamat.</div>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input min="1000" class="form-control number" name="harga" value="<?php echo $properti->harga ?>" required >
                <div class="invalid-feedback">Masukkan Harga properti.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control number" name="keterangan" rows="3" required><?php echo $properti->keterangan ?></textarea>
                <div class="invalid-feedback">Isi keterangan properti</div>
              </div>

              <div class="form-group">
                  <label for="gambar">Foto Properti</label>
                  <br>
                  <?php if( $properti->gambar ) : ?>
                    <img style="width: 100px;height: 100%" src="<?php echo base_url('assets/uploads/properti/').$properti->gambar?>">
                    <?php ; else : ?>
                      <img src="https://via.placeholder.com/350x250" alt="" style="width:25%;">
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
