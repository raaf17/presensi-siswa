<?php foreach ($guru_all as $guru) : ?>
    <div class="modal fade" id="editModal<?= $guru->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('admin/guru/update/' . $guru->id) ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" class="<?= ($validation->hasError('nama_guru')) ? 'is-invalid' : '' ?> form-control" name="nama_guru" id="nama_guru" value="<?= $guru->nama_guru ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_guru') ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama Guru</label>
                            <input type="text" class="<?= ($validation->hasError('nip')) ? 'is-invalid' : '' ?> form-control" name="nip" id="nip" value="<?= $guru->nip ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nip') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>