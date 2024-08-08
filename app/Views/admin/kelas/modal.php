<?php foreach ($kelas_all as $kelas) : ?>
    <div class="modal fade" id="editModal<?= $kelas->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('admin/kelas/update/' . $kelas->id) ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Kelas</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : '' ?> form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?= $kelas->nama_kelas ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kelas') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Jurusan</label>
                                    <select name="id_jurusan" id="" class="<?= ($validation->hasError('id_jurusan')) ? 'is-invalid' : '' ?> form-control" required>
                                        <option value="" hidden></option>
                                        <?php foreach ($jurusan_select as $jurusan) : ?>
                                            <option value="<?= $jurusan->id; ?>" <?= $kelas->id_jurusan == $jurusan->id ? 'selected' : null ?> ><?= $jurusan->nama_jurusan; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_jurusan') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Guru</label>
                                    <select name="id_guru" id="" class="form-control" required>
                                        <option value="" hidden></option>
                                        <?php foreach ($guru_select as $guru) : ?>
                                            <option value="<?= $guru->id; ?>" <?= $kelas->id_guru == $guru->id ? 'selected' : null ?> ><?= $guru->nama_guru; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_guru') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                    <textarea cols="30" rows="1" class="<?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?> form-control" name="keterangan" id="keterangan" placeholder="Keterangan"><?= $kelas->keterangan ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan') ?>
                                    </div>
                                </div>
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