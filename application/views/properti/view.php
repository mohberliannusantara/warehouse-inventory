<div class="row">
  <div class="col-md-12">
    <center>
      <!-- Load thumbnail, jika ada -->
      <?php if( $properti->gambar ) : ?>
        <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->gambar  ?>" alt="" style="width:100%;">
        <?php ; else : ?>
          <img src="https://via.placeholder.com/350x250" alt="" style="">
        <?php endif; ?>
      </center>
    </div>
  </div>
  <br>
  <!-- <div class="row">
  <div class="col-md-5">
  <?php if( $properti->scan_sertifikat ) : ?>
  <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->scan_sertifikat  ?>" alt="" style="width:100%;">
  <?php ; else : ?>
  <img src="https://via.placeholder.com/450x250" alt="" style="height:250px;width:100%;">
<?php endif; ?>
</div>
</div>
<div class="col-md-3">
<h5>ID Properti</h5>
<h5>Luas</h5>
<h5>Sertifikat</h5>
<h5>Lokasi</h5>
<h5>Harga</h5>
<h5>Keterangan</h5>
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
<?php echo $properti->lokasi; ?>
</h5>
<h5>
Rp. <?php echo number_format($properti->harga); ?>
</h5>
<h5>
<?php echo $properti->keterangan ?>
</h5>
</div>
</div> -->
<div class="row">
  <div class="col-md-4">
    <!-- Load thumbnail, jika ada -->
    <?php if( $properti->gambar ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->gambar  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/200x350" alt="" style="height: 70%;width:100%;">
      <?php endif; ?>
    </div>
    <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>
              <h5>ID Properti</h5>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <h5>
                <?php echo $properti->id_properti; ?>
              </h5>
            </td>
          </tr>
        </tbody>
      </table>
      <h5>Luas</h5>
      <h5>Sertifikat</h5>
      <h5>Lokasi</h5>
      <h5>Harga</h5>
      <h5>Keterangan</h5>
    </div>
    <div class="col-md-5">
      <h5>
        <?php echo $properti->luas; ?>
      </h5>
      <h5>
        <?php echo $properti->no_sertifikat; ?>
      </h5>
      <h5>
        <?php echo $properti->lokasi; ?>
      </h5>
      <h5>
        Rp. <?php echo number_format($properti->harga); ?>
      </h5>
      <h5>
        <?php echo $properti->keterangan ?>
      </h5>
    </div>
  </div>
