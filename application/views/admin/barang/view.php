<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->
    <center>
      <?php if( $barang->gambar ) : ?>
        <img src="<?php echo base_url() .'assets/uploads/barang/'. $barang->gambar  ?>" alt="" style="width:100%;">
        <?php ; else : ?>
          <img src="https://via.placeholder.com/350x250" alt="" style="width:50%;">
        <?php endif; ?>
      </center>
    </div>
    <div class="col-md-7">
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
            <td>Nama</td>
            <td><?php echo $barang->nama_barang ?></td>
          </tr>
          <tr>
            <td>Jenis</td>
            <td><?php echo $barang->nama_jenis_barang ?></td>
          </tr>
          <tr>
            <td>Kondisi</td>
            <td><?php echo $barang->nama_kondisi ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><?php echo $barang->harga ?></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><?php echo $barang->keterangan ?></td>
          </tr>
          <tr>
            <td>Rayon</td>
            <td><?php echo $barang->nama_rayon ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
