<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title "><?php echo $page_title; ?></h4>
            <p class="card-category"><?php echo $page_content; ?></p>
          </div>
          <div class="card-body">
            <form action="<?php base_url('Barang/create') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_barang" >Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $barang->nama_barang ?>" required autofocus>
                <div class="invalid-feedback">Masukkan nama barang.</div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="jenis_barang">Jenis Barang</label>
                    <select class="custom-select" name="jenis_barang" required>
                      <option selected value="">Pilih Jenis Barang</option>
                      <?php foreach ($jenis_barang as $row): ?>
                        <option value="<?php $row->id_jenis_barang ?>">
                          <?php echo $row->nama_jenis_barang; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Pilih dulu kategorinya gan</div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="kondisi_model">Kondisi Barang</label>
                    <select class="custom-select" name="kondisi" required>
                      <option selected value="">Pilih Kondisi Barang</option>
                      <?php foreach ($kondisi as $row): ?>
                        <option value="<?php $row->id_kondisi ?>">
                          <?php echo $row->nama_kondisi; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label for="harga">Harga</label>
                <input min="1000" class="form-control number" name="harga" value="<?php echo $barang->harga ?>" required >
                <div class="invalid-feedback">Masukkan Harga barang.</div>
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control number" name="keterangan" rows="3" required><?php echo $barang->keterangan ?></textarea>
                <div class="invalid-feedback">Isi keterangan barang</div>
              </div>

              <div class="form-group">
                <label for="gambar">Foto Barang</label>
                <br>
                <img style="width: 100px;height: 100%" src="<?php echo base_url('assets/uploads/barang/').$barang->gambar?>">
              </div>

              <label class="file">
                <input type="file" class="form-control-file" name="gambar">
                <span class="file-custom"></span>
              </label>
              <div class="form-group">
                <input class="btn btn-danger" type="submit" value="Pindah">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
