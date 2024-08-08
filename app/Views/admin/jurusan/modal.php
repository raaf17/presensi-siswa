<?php foreach ($jurusan_all as $jurusan) : ?>
    <div class="modal fade" id="editModal<?= $jurusan->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('admin/jurusan/update/' . $jurusan->id) ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field() ?>
                        <label>Nama Jurusan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="<?= ($validation->hasError('nama_jurusan')) ? 'is-invalid' : '' ?> form-control" name="nama_jurusan" id="nama_jurusan" value="<?= $jurusan->nama_jurusan ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_jurusan') ?>
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