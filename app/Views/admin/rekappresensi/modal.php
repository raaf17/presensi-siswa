<div class="modal fade" id="filter-tanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $awal_tanggal = date('Y-m-01');
                        ?>
                        <div class="col-lg-5">
                            <input type="text" name="tanggal_awal" id="awal_tanggal" class="form-control datepicker" value="<?php echo $awal_tanggal; ?>">
                        </div>
                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                            <label>S/d</label>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" name="tanggal_akhir" id="akhir_tanggal" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <center>
                        <button type="submit" class="btn btn-primary" name="export">Export Excel</button>
                        <button type="submit" class="btn btn-info">Tampilkan</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="filter-bulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $awal_bulan = date('Y-m-01');
                        ?>
                        <div class="col-lg-5">
                            <select name="filter_bulan" id="filter_bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                            <label>S/d</label>
                        </div>
                        <div class="col-lg-5">
                            <select name="filter_tahun" id="filter_tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <option value="1">2024</option>
                                <option value="2">2025</option>
                                <option value="3">2026</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <center>
                        <button type="submit" class="btn btn-info">Tampilkan</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>