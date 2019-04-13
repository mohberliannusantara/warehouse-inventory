<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <?php if( $kendaraan->gambar ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/kendaraan/'. $kendaraan->gambar  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:100%;">
      <?php endif; ?>
  </div>
  <div class="col-md-3">

  </div>
  <center>

  </center>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <!-- <th></th> -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Nama Kendaraan</th>
        <td><?php echo $kendaraan->nama_kendaraan; ?></td>
      </tr>
      <tr>
        <th>Plat Nomor</th>
        <td><?php echo $kendaraan->nomor_polisi; ?></td>
      </tr>
      <tr>
        <th>Pengguna</th>
        <td><?php echo $kendaraan->pengguna ?></td>
      </tr>
      <tr>
        <th>Rayon</th>
        <td><?php echo $kendaraan->nama_rayon; ?></td>
      </tr>
      <tr>
        <th>Pemilik Kendaraan</th>
        <td><?php echo $kendaraan->nama_pemilik_kendaraan ?></td>
      </tr>
      <tr>
        <th>Jenis</th>
        <td><?php echo $kendaraan->nama_jenis_kendaraan; ?></td>
      </tr>
      <tr>
        <th>Status</th>
        <td><?php echo $kendaraan->status ?></td>
      </tr>
      <tr>
        <th>Tanggal Berlaku</th>
        <td><?php echo date_format(date_create($kendaraan->tanggal_berlaku), "d/m/Y"); ?></td>
      </tr>
      <tr>
        <th>Stan Awal</th>
        <td><?php echo $kendaraan->stan_awal ?></td>
      </tr>
      <tr>
        <th>Stan Akhir</th>
        <td><?php echo $kendaraan->stan_akhir ?></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><?php echo $kendaraan->keterangan ?></td>
      </tr>
    </tbody>
  </table>
</div>
