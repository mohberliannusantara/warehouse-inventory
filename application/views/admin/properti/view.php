<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <?php if( $properti->foto_properti ) : ?>
      <img src="<?php echo base_url() .'assets/uploads/properti/'. $properti->foto_properti  ?>" alt="" style="width:100%;">
      <?php ; else : ?>
        <img src="<?php echo base_url() .'assets/img/image_placeholder.jpg' ?>" alt="" style="width:100%;">
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
          <td><?php echo $properti->nama_properti; ?></td>
        </tr>
        <tr>
          <th>Jenis / Wujud</th>
          <td><?php echo $properti->jenis_properti; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>
            <?php echo $properti->alamat ?>
            <br>
            <a href="<?php echo $properti->lokasi ?>" target="_blank" class="btn btn-sm btn-info">Tinjau</a>
          </td>
        </tr>
        <tr>
          <th>Luas Tanah</th>
          <td><?php echo $properti->luas_tanah ?></td>
        </tr>
        <tr>
          <th>Luas Bangunan</th>
          <td><?php echo $properti->luas_bangunan; ?></td>
        </tr>
        <tr>
          <th>Tahun Perolehan</th>
          <td><?php echo date('d/m/Y', strtotime($properti->tahun_perolehan)) ?></td>
        </tr>
        <tr>
          <th>Harga Perolehan</th>
          <td>Rp. <?php echo $properti->harga; ?>,-</td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?php echo $properti->status ?></td>
        </tr>
        <tr>
          <th>Nomor Sertfikat</th>
          <td>
            <?php echo $properti->no_sertifikat ?>
            <br>
            <?php if( $properti->foto_sertifikat ) : ?>
              <a href="<?php echo base_url('assets/uploads/properti/pajak/') .$properti->foto_pajak ?>" target="_blank" class="btn btn-sm btn-rose">Lihat</a>
            <?php else: ?>
              <a href="<?php echo base_url('admin/properti/edit/').$properti->id_properti ?>" class="btn btn-sm btn-primary" target="_blank">Upload</a>
            <?php endif; ?>
          </div>
        </td>
      </tr>
      <tr>
        <th>Tanggal Berlaku</th>
        <td><?php echo date('d/m/Y', strtotime($properti->tanggal_berlaku_sertifikat)) ?> - <?php echo date('d/m/Y', strtotime($properti->tahun_perolehan)) ?></td>
      </tr>
      <tr>
        <th>Nomor Pajak</th>
        <td>
          <?php echo $properti->no_pajak ?>
          <br>
          <?php if ($properti->foto_pajak): ?>
            <a href="<?php echo base_url('assets/uploads/properti/pajak/') .$properti->foto_pajak ?>" target="_blank" class="btn btn-sm btn-rose">Lihat</a>
          <?php else: ?>
            <a href="<?php echo base_url('admin/properti/edit/').$properti->id_properti ?>" class="btn btn-sm btn-primary" target="_blank">Upload</a>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><?php echo $properti->keterangan ?></td>
      </tr>
    </tbody>
  </table>
</div>
