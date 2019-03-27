<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <?php if( $properti->foto_properti ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->foto_properti  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="https://via.placeholder.com/350x250" alt="" style="width:100%;">
      <?php endif; ?>
  </div>
  <div class="col-md-3">

  </div>
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
        <th>Nama Properti</th>
        <td><?php echo $properti->nama_kendaraan; ?></td>
      </tr>
      <tr>
        <th>Jenis / Wujud</th>
        <td><?php echo $properti->nomor_polisi; ?></td>
      </tr>
      <tr>
        <th>Luas Tanah</th>
        <td><?php echo $properti->pengguna ?></td>
      </tr>
      <tr>
        <th>Luas Bangunan</th>
        <td><?php echo $properti->nama_rayon; ?></td>
      </tr>
      <tr>
        <th>Tahun Perolehan</th>
        <td><?php echo $properti->nama_pemilik_kendaraan ?></td>
      </tr>
      <tr>
        <th>Harga Perolehan</th>
        <td><?php echo $properti->nama_jenis_kendaraan; ?></td>
      </tr>
      <tr>
        <th>Status</th>
        <td><?php echo $properti->status ?></td>
      </tr>
      <tr>
        <th>Tanggal Berlaku</th>
        <td><?php echo date_format(date_create($properti->tanggal_berlaku), "d/m/Y"); ?></td>
      </tr>
      <tr>
        <th>Stan Awal</th>
        <td><?php echo $properti->stan_awal ?></td>
      </tr>
      <tr>
        <th>Stan Akhir</th>
        <td><?php echo $properti->stan_akhir ?></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><?php echo $properti->keterangan ?></td>
      </tr>
    </tbody>
  </table>
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
