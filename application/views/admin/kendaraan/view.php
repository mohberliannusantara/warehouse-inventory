<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->
    <?php if( $kendaraan->gambar ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/kendaraan/'. $kendaraan->gambar  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:100%;">
      <?php endif; ?>
    </div>
    <div class="col-md-3">
      <h5>ID Kendaraan</h5>
      <h5>Nomor Plat</h5>
      <h5>Nama Kendaraan</h5>
      <h5>Jenis</h5>
      <h5>Rayon</h5>
      <h5>Keterangan</h5>
    </div>
    <div class="col-md-4">
      <h5>
        <?php echo $kendaraan->id_kendaraan; ?>
      </h5>
      <h5>
        <?php echo $kendaraan->nomor_polisi; ?>
      </h5>
      <h5>
        <?php echo $kendaraan->nama_kendaraan; ?>
      </h5>
      <h5>
        <?php echo $kendaraan->nama_jenis_kendaraan; ?>
      </h5>
      <h5>
        <?php echo $kendaraan->nama_rayon; ?>
      </h5>
      <h5>
        <?php echo $kendaraan->keterangan ?>
      </h5>
    </div>
  </div>
