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
      <h5>ID Properti</h5>
      <h5>Luas</h5>
      <h5>Setifikat</h5>
      <h5>Harga</h5>
      <h5>Keterangan</h5>
      <h5>Lokasi</h5>
    </div>
    <div class="col-md-4">
      <h5>
        <?php echo $properti->id_properti; ?>
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
    </div>
  </div>
