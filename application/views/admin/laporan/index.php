<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">inventory</i>
                        </div>
                        <h4 class="card-title">Laporan Extracomptable</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="rayon">Rayon</label>
                            <select onchange="myFunction()" id="rayon" class="custom-select" name="rayon" required>
                                <option selected value="">Pilih Rayon</option>
                                <?php foreach ($rayon as $row): ?>
                                <option value="<?php echo $row->id_rayon ?>">
                                    <?php echo $row->nama_rayon; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <?php echo form_open('admin/barang/export')?>
                        <input type="hidden" name="rayon1" id="tb_rayon1" value="" />
                        <button type="submit" class="btn btn-fill btn-rose"><i
                                class="material-icons">arrow_downward</i>Donwload</a>
                            <?php echo form_close()?>
                            <?php echo form_open('admin/barang/preview')?>
                            <input type="hidden" name="rayon2" id="tb_rayon2" value="" />
                            <button type="submit" class="btn btn-primary"><i class="material-icons">zoom_out_map</i>
                                Preview</button>
                            <?php echo form_close()?>
                    </div>
                </div>
            </div>



            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <h4 class="card-title">Laporan Kendaraan</h4>
                    </div>
                    <div class="card-body ">
                        <form method="#" action="#">
                            <div class="form-group">
                                <label for="rayon">Rayon</label>
                                <select onchange="myFunction2()" id="rayon2" class="custom-select" name="rayon2"
                                    required>
                                    <option selected value="">Pilih Rayon</option>
                                    <?php foreach ($rayon as $row): ?>
                                    <option value="<?php echo $row->id_rayon ?>">
                                        <?php echo $row->nama_rayon; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer ">
                        <?php echo form_open('admin/kendaraan/export')?>
                        <input type="hidden" name="rayon3" id="tb_rayon3" />
                        <button type="submit" class="btn btn-fill btn-rose"><i
                                class="material-icons">arrow_downward</i>Donwload</a>
                            <?php echo form_close()?>
                            <?php echo form_open('admin/kendaraan/preview')?>
                            <input type="hidden" name="rayon4" id="tb_rayon4" />
                            <button type="submit" class="btn btn-primary"><i class="material-icons">zoom_out_map</i>
                                Preview</button>
                            <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">home</i>
                        </div>
                        <h4 class="card-title">Laporan Properti</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="rayon">Rayon</label>
                            <select onchange="myFunction3()" id="rayon3" class="custom-select" name="rayon3" required>
                                <option selected value="">Pilih Rayon</option>
                                <?php foreach ($rayon as $row): ?>
                                <option value="<?php echo $row->id_rayon ?>">
                                    <?php echo $row->nama_rayon; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer ">
                        <?php echo form_open('admin/properti/export')?>
                        <input type="hidden" name="rayon5" id="tb_rayon5" />
                        <button type="submit" class="btn btn-fill btn-rose"><i
                                class="material-icons">arrow_downward</i>Donwload</a>
                            <?php echo form_close()?>
                            <?php echo form_open('admin/properti/preview')?>
                            <input type="hidden" name="rayon6" id="tb_rayon6" />
                            <button type="submit" class="btn btn-primary"><i class="material-icons">zoom_out_map</i>
                                Preview</button>
                            <?php echo form_close()?>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">person</i>
                        </div>
                        <h4 class="card-title">Laporan Pengguna</h4>
                    </div>
                    <div class="card-body ">
                        <form method="#" action="#">
                            <div class="form-group">
                                <label for="rayon">Pengguna</label>
                                <h5>laporan tentang daftar admin / pengguna.</h5>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer ">
                        <a href="<?php echo site_url('admin/pengguna/export')?>" class="btn btn-fill btn-info"><i
                                class="material-icons">arrow_downward</i>Donwload</a>
                        <a href="<?php echo site_url('admin/pengguna/preview')?>" class="btn btn-primary"><i class="material-icons">zoom_out_map</i>
                            Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("rayon").value;
    document.getElementById("tb_rayon1").value = x;
    document.getElementById("tb_rayon2").value = x;
}

function myFunction2() {
    var x = document.getElementById("rayon2").value;
    document.getElementById("tb_rayon3").value = x;
    document.getElementById("tb_rayon4").value = x;
}

function myFunction3() {
    var x = document.getElementById("rayon3").value;
    document.getElementById("tb_rayon5").value = x;
    document.getElementById("tb_rayon6").value = x;
}
</script>