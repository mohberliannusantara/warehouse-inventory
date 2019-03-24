<div class="row">
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
    <h5><?php echo $properti->nama_properti; ?></h5>
    <h5><?php echo $properti->jenis_properti; ?></h5>
    <h5><?php echo $properti->luas_tanah; ?></h5>
    <h5><?php echo $properti->luas_bangunan; ?></h5>
    <h5><?php echo $properti->harga; ?></h5>
    <h5><?php echo $properti->tahun_perolehan; ?></h5>
    <h5><?php echo $properti->keterangan ?></h5>
    <h5><?php echo $properti->no_sertifikat; ?></h5>
    <h5><?php echo $properti->tanggal_berlaku_sertifikat; ?></h5>
    <h5><?php echo $properti->tanggal_kadaluarsa_sertifikat; ?></h5>
    <h5><?php echo $properti->no_pajak; ?></h5>
    <h5><?php echo $properti->tanggal_kadaluarsa_sertifikat; ?></h5>
    <h5><?php echo $properti->alamat; ?></h5>
    <h5><?php echo $properti->lokasi; ?></h5>

    <h5><a target="_blank" href="<?php echo $properti->lokasi ?>"><?php echo $properti->alamat ?></a></h5>
    <a target="_blank" href="<?php echo base_url('assets/uploads/properti/sertifikat/').$properti->foto_sertifikat ?>" type="button" class="btn btn-rose">Lihat Sertfikat</a>
    <a target="_blank" href="<?php echo base_url('assets/uploads/properti/pajak/').$properti->foto_pajak ?>" type="button" class="btn btn-warning">Lihat PBB</a>
    <a target="_blank" type="button" href="<?php echo $properti->lokasi ?>" class="btn btn-success">Lihat Lokasi</a>
  </div>
</div>
