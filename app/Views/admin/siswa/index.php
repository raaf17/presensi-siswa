<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Master Data</div>
                <div class="breadcrumb-item active"><a href="<?= route_to('siswa') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('admin/siswa/trash'); ?>" class="btn btn-info"><i class="fas fa-file-excel"></i> Import</a>
                        <a href="<?= site_url('admin/siswa/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Handphone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($siswa_all as $siswa) : ?>
                                    <tr>
                                        <td width="5"><?= $no++ ?>.</td>
                                        <td><?= $siswa->nisn ?></td>
                                        <td><?= $siswa->nama_siswa ?></td>
                                        <td><?= $siswa->nama_kelas ?></td>
                                        <td><?= $siswa->jenis_kelamin ?></td>
                                        <td><?= $siswa->no_handphone ?></td>
                                        <td width="150" class="text-center align-items-center">
                                            <a href="<?= site_url('admin/siswa/detail/' . $siswa->id) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="<?= site_url('admin/siswa/edit/' . $siswa->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= site_url('admin/siswa/delete/' . $siswa->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated at <?php $zone = 3600 * +7;
                                                                        $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                        echo "$date"; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>