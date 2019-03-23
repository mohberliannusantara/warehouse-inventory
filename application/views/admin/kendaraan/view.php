<div class="row">
  <!-- <div class="col-md-5"> -->
  <!-- Load thumbnail, jika ada -->
  <center>
    <?php if( $kendaraan->gambar ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/kendaraan/'. $kendaraan->gambar  ?>" alt="" style="width:50%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:50%;">
      <?php endif; ?>
    </center>
  </div>
  <div class="row">
    <table class="table table-reflow">
      <thead>
        <tr>
          <!-- <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nama Kendaraan</td>
          <td><?php echo $kendaraan->nama_kendaraan; ?></td>
        </tr>
        <tr>
          <td>Plat Nomor</td>
          <td><?php echo $kendaraan->nomor_polisi; ?></td>
        </tr>
        <tr>
          <td>Pengguna</td>
          <td><?php echo $kendaraan->pengguna ?></td>
        </tr>
        <tr>
          <td>Rayon</td>
          <td><?php echo $kendaraan->nama_rayon; ?></td>
        </tr>
        <tr>
          <td>Pemilik Kendaraan</td>
          <td><?php echo $kendaraan->nama_pemilik_kendaraan ?></td>
        </tr>
        <tr>
          <td>Jenis</td>
          <td><?php echo $kendaraan->nama_jenis_kendaraan; ?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><?php echo $kendaraan->status ?></td>
        </tr>
        <tr>
          <td>Tanggal Berlaku</td>
          <td><?php echo $kendaraan->tanggal_berlaku ?></td>
        </tr>
        <tr>
          <td>Stan Awal</td>
          <td><?php echo $kendaraan->stan_awal ?></td>
        </tr>
        <tr>
          <td>Stan Akhir</td>
          <td><?php echo $kendaraan->stan_akhir ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <?php echo $kendaraan->keterangan ?>
        </tr>
      </tbody>
    </table>
  </div>
