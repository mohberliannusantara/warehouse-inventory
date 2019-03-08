<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->
    <?php if( $barang->gambar ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/barang/'. $barang->gambar  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:100%;">
      <?php endif; ?>
    </div>
    <div class="col-md-3">
      <h5>ID Barang</h5>
      <h5>Nama Barang</h5>
      <h5>Jenis</h5>
      <h5>Kondisi</h5>
      <h5>Harga</h5>
      <h5>Rayon</h5>
      <h5>Keterangan</h5>
    </div>
    <div class="col-md-4">
      <h5>
        <?php echo $barang->id_barang; ?>
      </h5>
      <h5>
        <?php echo $barang->nama_barang; ?>
      </h5>
      <h5>
        <?php echo $barang->nama_jenis_barang; ?>
      </h5>
      <h5>
        <?php echo $barang->nama_kondisi; ?>
      </h5>
      <h5>
        Rp. <?php echo number_format($barang->harga); ?>
      </h5>
      <h5><?php echo $barang->nama_rayon ?></h5>
      <h5>
        <?php echo $barang->keterangan ?>
      </h5>
    </div>
  </div>
