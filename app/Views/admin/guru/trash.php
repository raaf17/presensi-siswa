<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Master Data</div>
                <div class="breadcrumb-item"><a href="<?= route_to('guru') ?>">Data Guru</a></div>
                <div class="breadcrumb-item active"><a href="<?= route_to('guru.trash') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Guru - Trash</h4>
                            <div class="card-header-action">
                                <a href="<?= site_url('admin/guru/restore'); ?>" class="btn btn-info">Restore All</a>
                                <form action="<?= site_url('admin/guru/delete2/'); ?>" method="post" class="d-inline tombol-hapus">
                                    <?= csrf_field(); ?>
                                    <button href="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-md" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Guru</th>
                                            <th>NIP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($guru_trash as $guru) : ?>
                                            <tr>
                                                <td width="5"><?= $no++; ?></td>
                                                <td><?= $guru->nama_guru; ?></td>
                                                <td><?= $guru->nip; ?></td>
                                                <td width="120" class="text-center">
                                                    <a href="<?= site_url('admin/guru/restore/' . $guru->id); ?>" class="btn btn-info btn-sm">Restore</a>
                                                    <form action="<?= site_url('admin/guru/delete2/' . $guru->id); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                                                        <?= csrf_field(); ?>
                                                        <button href="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>