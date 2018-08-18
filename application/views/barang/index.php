<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="card card-profile">
            <div class="card-header card-header-info">
              <h4 class="card-title">Tambah Barang</h4>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Tambahkan Barang</h6>
              <p class="card-description">
                Menambahkan barang kedalam daftar dengan memasukkan informasi secara detail tentang barang tersebut
              </p>
              <!-- <a href="" class="btn btn-info btn-round">Tambah</a> -->
              <?php echo anchor('barang/create', 'Tambah', array('class' => 'btn btn-info btn-round')); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card card-profile">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Pindah Barang</h4>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Pindahkan Barang</h6>
              <p class="card-description">
                Memindahkan barang dengan memberikan keterangan tentang kemana barang akan dipindahkan
              </p>
              <a href="#pablo" class="btn btn-warning btn-round">Pindah</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Daftar Barang</h4>
            <p class="card-category"> menampilakan daftar seluruh barang yang tersedia</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Kondisi
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    aksi
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($barang as $value): ?>
                    <tr>
                      <td>
                        <?php echo $value->id_barang; ?>
                      </td>
                      <td>
                        <?php echo $value->nama_barang; ?>
                      </td>
                      <td>
                        <?php echo $value->kondisi; ?>
                      </td>
                      <td class="text-primary">
                        Rp. <?php echo number_format($value->harga); ?>
                      </td>
                      <td>
                        <button type="button" class="btn btn-sm btn-warning">Ubah</button>
                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
