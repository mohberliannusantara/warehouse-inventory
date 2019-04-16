<div class="row">
  <div class="col-md-5">
    <!-- Load thumbnail, jika ada -->
    <center>
      <?php if( $barang->gambar ) : ?>
        <img src="<?php echo base_url() .'assets/uploads/barang/'. $barang->gambar  ?>" alt="" style="width:100%;">
        <?php ; else : ?>
          <img src="<?php echo base_url() .'assets/img/image_placeholder.jpg' ?>" alt="" style="width:100%;">
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
            <th>Nama</th>
            <td><?php echo $barang->nama_barang ?></td>
          </tr>
          <tr>
            <th>Jenis</th>
            <td><?php echo $barang->nama_jenis_barang ?></td>
          </tr>
          <tr>
            <th>Kondisi</th>
            <td><?php echo $barang->nama_kondisi ?></td>
          </tr>
          <tr>
            <th>Harga</th>
            <td><?php echo $barang->harga ?></td>
          </tr>
          <tr>
            <th>Keterangan</th>
            <td><?php echo $barang->keterangan ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
