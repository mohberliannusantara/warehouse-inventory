<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->
    <?php if( $properti->foto_properti ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->foto_properti  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:100%;">
      <?php endif; ?>
    </div>
    <div class="col-md-3">
      <h5>Nama Properti</h5>
      <h5>Jenis/Wujud Properti</h5>
      <h5>Rayon</h5>
      <h5>Luas Tanah</h5>
      <h5>Luas Bagunan</h5>
      <h5>Harga Perolehan</h5>
      <h5>Tahun Perolehan</h5>
      <h5>Status</h5>
      <h5>Nomor Sertfikat</h5>
      <h5>Setifikat</h5>
      <h5>Harga</h5>
      <h5>Keterangan</h5>
      <h5>Lokasi</h5>
    </div>
    <div class="col-md-4">
      <h5>
        <?php echo $properti->nama_properti; ?>
      </h5>
      <h5>
        <?php echo $properti->luas; ?>
      </h5>
      <h5>
        <?php echo $properti->no_sertifikat; ?>
      </h5>
      <h5>
        Rp. <?php echo number_format($properti->harga); ?>
      </h5>
      <h5>
        <?php echo $properti->keterangan ?>
      </h5>
      <h5>
        <a target="_blank" href="<?php echo $properti->lokasi ?>"><?php echo $properti->alamat ?></a>
      </h5>
      <button type="button" class="btn btn-rose">Lihat Sertfikat</button>
      <button type="button" class="btn btn-warning">Lihat PBB</button>
      <button type="button" class="btn btn-success">Lihat Lokasi</button>
    </div>
  </div>
