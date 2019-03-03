<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->

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
        <?php echo $properti->lokasi; ?>
      </h5>
      <h5>
        <a target="_blank" href="http://www.creative-tim.com/">Creative Tim</a>
      </h5>
    </div>
  </div>
