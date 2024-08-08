<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header" style="padding: 20px 24px !important;margin-bottom: -30px;">
                <h5 style="margin-top: 16px;">Detail Pegawai</h5>
            </div>
            <div class="card-body">
                <img width="100px" style="border-radius: 10px; margin-bottom: 10px" src="<?= base_url('/assets/img/' . $pegawai_detail->foto) ?>" alt="">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td width="30%">
                                NIP
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->nip ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Nama
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->nama ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Username
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->username ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Jenis Kelamin
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->jenis_kelamin ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Alamat
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->alamat ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                No. Handphone
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->no_handphone ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Jabatan
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->nama_jabatan ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Lokasi Presensi
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->alamat_lokasi ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Status
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <span class="btn btn-sm btn-success"><?= $pegawai_detail->status ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                Role
                            </td>
                            <td width="10">
                                :
                            </td>
                            <td>
                                <?= $pegawai_detail->role ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= site_url('admin/pegawai') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>